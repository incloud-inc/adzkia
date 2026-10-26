# Multi-Tenant Architecture & Data Integrity Invariants

## 1. Separation of Subscription Tier and Lifecycle State
- **Never conflate subscription plans with operational status**:
  - The `tenants.plan` column represents the commercial/feature tier (`gratis`, `premium`, `whitelabel`).
  - The `tenants.status` column represents the operational lifecycle (`active`, `inactive`, `suspended`).
- **Preserve original subscription tiers on deactivation**:
  - Deactivating a tenant must set `status = 'inactive'`, leaving their `plan` intact so the system retains knowledge of their tier upon reactivation.
  - When querying active tenants, always verify `status === 'active'`.

## 2. In-Memory Request Memoization in Global Scopes
- **Prevent query amplification in `Scope::apply()`**:
  - Global scopes (like `TenantScope`) run on *every* Eloquent query for the scoped model.
  - Never execute unmemoized lookups (such as `Tenant::find($tenantId)`) inside `apply()`.
  - Maintain a static request cache (`protected static array $tenantCache = []`) within the scope to guarantee that the tenant model is resolved at most once per HTTP request lifecycle.
- **Strictly qualify global shared assets**:
  - Assets marked `is_mandatory` or `is_global` must only be shared across tenants if they originate from the Platform Owner (`tenant_id IS NULL`, `tenant_id = 1`, or super-user owned tenant). Tenant-created assets must never leak across tenant boundaries.

## 3. Strict Boundary Rules for Math / Formula Transformations
- **Never use bare substring replacement on natural language text**:
  - Verbal formula conversions (e.g. converting `akar` or `sqrt` into LaTeX `\sqrt`) must strictly enforce formula syntax delimiters (such as curly braces `{...}`, parentheses `(...)`, or explicit degree brackets `[...]`).
  - Always enforce negative lookbehinds (e.g. `(?<![a-zA-Z0-9_\$\\\\])`) to prevent mangling common Indonesian words and place names (e.g., *Jakarta*, *Yogyakarta*, *kebakaran*, *pakar*, *akar masalah*).
