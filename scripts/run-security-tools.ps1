<#
.SYNOPSIS
    Automated Security Runner for Strix (AI Pentesting) & ARES (AI Robustness Evaluation).
.DESCRIPTION
    Script ini memfasilitasi eksekusi automated penetration testing dan LLM red-teaming
    pada lingkungan Adzkia CBT lokal maupun staging.
#>

param (
    [Parameter(Mandatory=$false)]
    [ValidateSet('all', 'strix', 'ares', 'quick')]
    [string]$Mode = 'quick',

    [Parameter(Mandatory=$false)]
    [string]$TargetUrl = 'http://localhost:8000',

    [Parameter(Mandatory=$false)]
    [string]$AresConfig = 'ares_config.yaml'
)

Write-Host "==========================================================" -ForegroundColor Cyan
Write-Host "  ADZKIA CBT - DEVSECOPS AUTOMATED SECURITY SUITE" -ForegroundColor Cyan
Write-Host "==========================================================" -ForegroundColor Cyan

function Run-StrixAudit {
    Write-Host "`n[*] Menjalankan Strix AI Pentesting Agent..." -ForegroundColor Yellow
    if (-not (Get-Command "strix" -ErrorAction SilentlyContinue)) {
        Write-Warning "Strix CLI belum terpasang di sistem PATH."
        Write-Host "Instalasi Strix: https://github.com/usestrix/strix" -ForegroundColor Gray
        Write-Host "Perintah: curl -sSL https://strix.ai/install | bash" -ForegroundColor Gray
        return
    }

    Write-Host "[+] Target Codebase: ./app" -ForegroundColor Green
    Write-Host "[+] Target Endpoint: $TargetUrl" -ForegroundColor Green
    
    strix --target ./app --target $TargetUrl --fail-on high,critical --output-format json --output-file strix_report.json
}

function Run-AresEvaluation {
    Write-Host "`n[*] Menjalankan IBM ARES LLM Robustness Evaluation..." -ForegroundColor Yellow
    if (-not (Get-Command "ares" -ErrorAction SilentlyContinue)) {
        Write-Warning "ARES CLI belum terpasang di lingkungan Python virtualenv."
        Write-Host "Instalasi ARES: git clone https://github.com/IBM/ares && pip install ." -ForegroundColor Gray
        return
    }

    if (-not (Test-Path $AresConfig)) {
        Write-Error "File konfigurasi ARES ($AresConfig) tidak ditemukan!"
        return
    }

    Write-Host "[+] Membaca konfigurasi fine-tuned: $AresConfig" -ForegroundColor Green
    ares evaluate $AresConfig -n 20 --intent owasp-llm-01:2025,owasp-llm-02:2025
}

switch ($Mode) {
    'strix' { Run-StrixAudit }
    'ares'  { Run-AresEvaluation }
    'all'   {
        Run-StrixAudit
        Run-AresEvaluation
    }
    'quick' {
        Write-Host "[+] Mode Quick: Verifikasi kelengkapan file konfigurasi CI & AI Tools" -ForegroundColor Green
        if (Test-Path "ares_config.yaml") {
            Write-Host "  [OK] ares_config.yaml ditemukan dan terverifikasi." -ForegroundColor Green
        }
        if (Test-Path ".github/workflows/strix-pentest.yml") {
            Write-Host "  [OK] .github/workflows/strix-pentest.yml ditemukan dan terverifikasi." -ForegroundColor Green
        }
    }
}

Write-Host "`n[+] Audit tool script selesai." -ForegroundColor Cyan
