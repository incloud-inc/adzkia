<?php

namespace Database\Seeders\Data;

class BahasaInggrisGrade6Unit1Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Kuis Unit 1 Bahasa Inggris Kelas 6 (Paket 1 - Regular Past Verbs)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Unit 1 bagian 1: Menguasai kata kerja beraturan Simple Past Tense (-ed/-d), kalimat positif/negatif/tanya, dan kegiatan lampau.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Cleaning the School Garden Yesterday', 'content' => '[Keterangan Gambar: Ilustrasi siswa-siswi kelas 6 sedang kerja bakti membersihkan taman sekolah kemarin sore: Budi menyiram tanaman bunga matahari, Siti menyapu dedaunan kering, dan Edo mengecat pagar kayu dengan kuas.]

Yesterday morning, the grade 6 students worked together to clean the school botanical garden. The class teacher, Pak Aris, divided the students into three small groups. Budi\'s group watered the colorful sunflower beds and weeded the vegetable plots. Meanwhile, Siti and her friends swept the dry leaves and gathered them into large compost bins. In the corner of the garden, Edo and Dani painted the wooden fence with bright green paint. They worked enthusiastically until midday. After finishing their duties, they washed their hands and enjoyed fresh coconut water together. All the students felt tired, but they were very proud because the school garden looked clean, neat, and beautiful.'],
                            ['title' => 'Stimulus 2: Rules for Regular Past Tense Verbs (-ed)', 'content' => '[Keterangan Gambar: Bagan tata bahasa pembentukan kata kerja beraturan (Regular Verbs) Simple Past Tense: 1. Kata kerja umum ditambah -ed (play -> played, clean -> cleaned), 2. Berakhiran huruf e ditambah -d (live -> lived, dance -> danced), 3. Konsonan + vokal + konsonan ganda (stop -> stopped, plan -> planned), 4. Berakhiran konsonan + y berubah menjadi -ied (study -> studied, carry -> carried).]

The Simple Past Tense is used to describe completed actions or states that happened at a specific time in the past. Regular verbs form their past tense by adding the suffix -ed or -d to the base form (V1). Common time expressions for the simple past include: *yesterday, last night, two days ago, last week, and this morning*. In negative sentences, we use the auxiliary verb *did not (didn\'t) + base verb* (for example: *He didn\'t watch television yesterday*).'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Based on Stimulus 1, what did Budi\'s group do yesterday morning?',
                                'explanation' => 'In the text: "Budi\'s group watered the colorful sunflower beds and weeded the vegetable plots."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'They watered the sunflower beds and weeded the vegetable plots.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'They painted the school classroom walls blue.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'They played football in the main school yard.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'They cooked fried rice in the school canteen.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What regular past verb indicates the activity done by Edo and Dani on the wooden fence?',
                                'explanation' => 'Edo and Dani "painted" the wooden fence.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Painted', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Swept', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Washed', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Gathered', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO regular past verbs (ending in -ed) found in the story!',
                                'explanation' => 'Watered and painted are regular past verbs. Swept and felt are irregular.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Watered (from water)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Painted (from paint)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Swept (from sweep)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Felt (from feel)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match each character with the past activity they performed yesterday!',
                                'explanation' => 'Pairs of characters and their past activities.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Budi\'s group', 'is_correct' => false, 'match_key' => 'Watered the sunflowers and weeded plots', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Siti and friends', 'is_correct' => false, 'match_key' => 'Swept dry leaves and gathered compost', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Edo and Dani', 'is_correct' => false, 'match_key' => 'Painted the wooden fence green', 'order' => 3],
                                    ['label' => null, 'option_text' => 'All students', 'is_correct' => false, 'match_key' => 'Washed their hands and drank coconut water', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What is the past tense form of the verb "study" according to the spelling rule?',
                                'explanation' => 'Verbs ending in consonant + y change y to i and add -ed: studied.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Studied', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Studyed', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Studing', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Studies', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Which time signal indicates that an action happened in the past?',
                                'explanation' => 'Yesterday morning is a past time signal.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Yesterday morning', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Every Sunday', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Right now', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tomorrow afternoon', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine whether each statement is True (Benar) or False (Salah) about regular past verbs!',
                                'explanation' => 'In negative sentences, didn\'t is followed by the base verb (V1), not V2.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'The past form of "play" is "played".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'In negative past sentences, we use "didn\'t" followed by the verb-2.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'The verb "stop" doubles the final letter p to become "stopped".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The correct negative sentence for "She visited her grandmother yesterday" is ....',
                                'explanation' => 'Subject + didn\'t + base verb (visit).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'She didn\'t visit her grandmother yesterday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'She didn\'t visited her grandmother yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'She doesn\'t visit her grandmother yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'She not visit her grandmother yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Choose the correct past form of the verb "watch": Yesterday, Doni ... an educational documentary on TV.',
                                'explanation' => 'Past form is watched.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'watched', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'watches', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'watching', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'watch', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'My sister ... her bedroom two hours ago.',
                                'explanation' => 'Two hours ago indicates simple past: cleaned.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'cleaned', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'cleans', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'cleaning', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'clean', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'They ... to music in the living room last night.',
                                'explanation' => 'Listened to music last night.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'listened', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'listens', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'listening', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'listener', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Did you ... your homework yesterday afternoon?',
                                'explanation' => 'In interrogative past (Did + S + V1), use base verb finish.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'finish', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'finished', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'finishing', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'finishes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'We ... play badminton yesterday because it rained heavily.',
                                'explanation' => 'Negative past auxiliary is didn\'t.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'didn\'t', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'doesn\'t', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'don\'t', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'aren\'t', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The students ... English together in the library yesterday.',
                                'explanation' => 'Practiced is the past form.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'practiced', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'practice', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'practicing', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'practices', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO sentences that correctly use the Simple Past Tense!',
                                'explanation' => 'Baked and played with past time markers are correct simple past sentences.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rina baked chocolate cookies with her mother yesterday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'The boys played basketball in the school court last Friday.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'He is playing basketball right now.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'They will bake cookies tomorrow.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO regular past verbs ending in -ied!',
                                'explanation' => 'Cry -> cried, tidy -> tidied. Play and stay end in vowel+y so only add -ed.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Cried (from cry)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tidied (from tidy)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Played (from play)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Stayed (from stay)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the base verb (V1) with its regular past form (V2)!',
                                'explanation' => 'Pairs of regular base verbs and past forms.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Help', 'is_correct' => false, 'match_key' => 'Helped', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Visit', 'is_correct' => false, 'match_key' => 'Visited', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Cook', 'is_correct' => false, 'match_key' => 'Cooked', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Plant', 'is_correct' => false, 'match_key' => 'Planted', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the subject and verb with the correct past time signal!',
                                'explanation' => 'Pairs of past actions and time signals.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'I walked to school', 'is_correct' => false, 'match_key' => 'Yesterday morning', 'order' => 1],
                                    ['label' => null, 'option_text' => 'They watched a movie', 'is_correct' => false, 'match_key' => 'Last Saturday night', 'order' => 2],
                                    ['label' => null, 'option_text' => 'She washed her bicycle', 'is_correct' => false, 'match_key' => 'Three hours ago', 'order' => 3],
                                    ['label' => null, 'option_text' => 'We planted mango seeds', 'is_correct' => false, 'match_key' => 'Last semester', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for regular verb spelling!',
                                'explanation' => 'Look -> looked (not lookt).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Live -> Lived', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Clap -> Clapped', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Look -> Lookt', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for past interrogative sentences!',
                                'explanation' => 'Did she cook dinner (use base verb cook, not cooked).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '"Did you call me last night?" is a correct question.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '"Did she cooked dinner?" is grammatically correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'The answer to "Did you study?" can be "Yes, I did."', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik pada soal berikut dengan jawaban yang tepat dan ringkas.',
                        'order' => 2,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of the regular verb "wash" is ....',
                                'explanation' => 'Wash -> washed.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'washed', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the sentence: "I ... (clean) my bicycle yesterday afternoon."',
                                'explanation' => 'Cleaned.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'cleaned', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the negative sentence: "He ... (not play) soccer last Sunday."',
                                'explanation' => 'didn\'t play (or did not play).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'didn\'t play', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The auxiliary verb used in past interrogative questions (Did you...?) is ....',
                                'explanation' => 'Auxiliary: did.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the sentence: "Siti ... (study) for the English exam last night."',
                                'explanation' => 'Study -> studied.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'studied', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'A common time signal meaning "kemarin" in English is ....',
                                'explanation' => 'Yesterday.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'yesterday', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the sentence: "Did they ... (visit) the national museum yesterday?"',
                                'explanation' => 'Base form: visit.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'visit', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau alasan logis yang lengkap.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Explain the general rules for forming regular past verbs in English (adding -ed, adding -d, doubling the consonant, and changing -y to -ied) and provide two examples for each rule!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. General rule (add -ed): play -> played, wash -> washed, clean -> cleaned.
2. Verbs ending in -e (add -d): live -> lived, dance -> danced, bake -> baked.
3. One syllable ending in C-V-C (double final consonant + -ed): stop -> stopped, clap -> clapped, plan -> planned.
4. Verbs ending in consonant + y (change y to i + -ed): study -> studied, cry -> cried, tidy -> tidied.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Change the following present tense sentences into correct Simple Past Tense sentences using the time expression "yesterday"!
a. (+) My father washes the family car in the front yard.
b. (-) The children do not play badminton in the park.
c. (?) Do you study English with your classmates?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
a. Past Positive (+): "My father washed the family car in the front yard yesterday."
b. Past Negative (-): "The children didn\'t play (did not play) badminton in the park yesterday."
c. Past Question (?): "Did you study English with your classmates yesterday?"',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Write a short paragraph (3-4 sentences) describing your activities yesterday morning using at least three different regular past verbs (e.g., helped, cleaned, watered, cooked)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
Sample Paragraph:
"Yesterday morning, I woke up early and helped my parents at home. First, I cleaned my bedroom and tidied my desk. After that, I watered the beautiful flower plants in the front garden. Finally, my mother cooked delicious pancakes for our breakfast."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Unit 1 Bahasa Inggris Kelas 6 (Paket 2 - Irregular Past Verbs)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Unit 1 bagian 2: Menguasai kata kerja tidak beraturan (went, saw, ate, drank, bought), kalimat tanya/negatif, dan percakapan lampau.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: A Memorable Weekend at the Traditional Market', 'content' => '[Keterangan Gambar: Suasana pasar tradisional pagi hari: Maya dan ibunya sedang membeli buah mangga dan sayuran segar di kios pedagang.]

Last Sunday, Maya went to the traditional market with her mother. They left home at six o\'clock in the morning. At the market, Maya saw many sellers and fresh produce. Her mother bought two kilograms of sweet oranges, a basket of fresh spinach, and half a kilogram of beef. Maya drank a glass of warm soy milk at a beverage stall, and she ate delicious traditional banana fritters (*pisang goreng*). On the way home, they took a traditional pedicab (*becak*). Maya had a wonderful time because she learned how people trade goods in a traditional market.'],
                            ['title' => 'Stimulus 2: Common Irregular Verbs in Daily Communication', 'content' => '[Keterangan Gambar: Daftar kata kerja tidak beraturan (Irregular Verbs) yang sering digunakan: go -> went, see -> saw, buy -> bought, eat -> ate, drink -> drank, write -> wrote, read -> read, make -> made, sleep -> slept.]

Unlike regular verbs, irregular verbs do not follow the rule of adding -ed. Instead, their past forms change in unique ways or sometimes remain the same (for example: *read /red/, cut /kʌt/)*. To master irregular verbs, students need to memorize their forms through reading and daily writing practice. In questions and negative sentences, we still use the base form (V1) with did/didn\'t (e.g., *Did you go to Bali?* not *Did you went?*).'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Based on Stimulus 1, what did Maya and her mother buy at the market?',
                                'explanation' => 'In the text: "bought two kilograms of sweet oranges, a basket of fresh spinach, and half a kilogram of beef."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Two kilograms of sweet oranges, spinach, and beef', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'A new bicycle and a school bag', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Five boxes of pizza and soda', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'A pair of sports shoes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What irregular past verb describes Maya\'s action of drinking soy milk?',
                                'explanation' => 'Past tense of drink is drank.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Drank', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Drinked', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Drinks', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Drinking', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO irregular past verbs found in the story!',
                                'explanation' => 'Went and bought are irregular past verbs.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Went (from go)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bought (from buy)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Walked (from walk)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Cleaned (from clean)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the irregular base verb (V1) with its past form (V2) in the text!',
                                'explanation' => 'Pairs of irregular verbs from the text.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Go', 'is_correct' => false, 'match_key' => 'Went', 'order' => 1],
                                    ['label' => null, 'option_text' => 'See', 'is_correct' => false, 'match_key' => 'Saw', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Buy', 'is_correct' => false, 'match_key' => 'Bought', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Eat', 'is_correct' => false, 'match_key' => 'Ate', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What is the past tense form of the verb "write"?',
                                'explanation' => 'Write -> wrote.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Wrote', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Writed', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Written', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Writing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Which sentence uses the irregular past verb correctly in a negative statement?',
                                'explanation' => 'Subject + didn\'t + base verb eat.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rudi didn\'t eat breakfast this morning.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rudi didn\'t ate breakfast this morning.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rudi doesn\'t ate breakfast this morning.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rudi not eat breakfast this morning.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for irregular past forms!',
                                'explanation' => 'Buy -> bought (not buyed).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Make -> Made', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Buy -> Buyed', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'See -> Saw', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The past form of the verb "have" is ....',
                                'explanation' => 'Have -> had.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Had', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Haved', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Has', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Having', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'My brother ... a letter to his pen pal in Australia yesterday.',
                                'explanation' => 'Past form of write is wrote.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'wrote', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'write', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'writed', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'writing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'We ... many exotic animals at the national safari park last weekend.',
                                'explanation' => 'See -> saw.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'saw', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'see', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'seed', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'seeing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Rina ... a glass of milk before going to bed last night.',
                                'explanation' => 'Drink -> drank.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'drank', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'drink', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'drinked', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'drinking', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'They ... fried rice and chicken satay for dinner yesterday.',
                                'explanation' => 'Eat -> ate.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ate', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'eat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'eated', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'eating', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Edo ... his bicycle to school yesterday morning.',
                                'explanation' => 'Ride -> rode.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'rode', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'ride', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'rided', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'riding', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Where did you ... on vacation last holiday?',
                                'explanation' => 'Did + S + base verb go.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'go', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'went', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'gone', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'going', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO correct irregular past sentences!',
                                'explanation' => 'Made and took are correct irregular past forms.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Siti made a delicious chocolate cake yesterday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Budi took his umbrella because it rained heavily.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Siti maked a delicious cake yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Budi taked his umbrella yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO verbs that have the same form in V1 and V2!',
                                'explanation' => 'Read and cut have identical spelling in past form.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Read (pronounced /red/ in past)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Cut', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Go', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Eat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the base verb with its irregular past form!',
                                'explanation' => 'Pairs of irregular verbs.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Take', 'is_correct' => false, 'match_key' => 'Took', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Give', 'is_correct' => false, 'match_key' => 'Gave', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Find', 'is_correct' => false, 'match_key' => 'Found', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Come', 'is_correct' => false, 'match_key' => 'Came', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the subject and verb with the correct object!',
                                'explanation' => 'Pairs of verbs and appropriate objects.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'She drank', 'is_correct' => false, 'match_key' => 'a cup of warm tea', 'order' => 1],
                                    ['label' => null, 'option_text' => 'He ate', 'is_correct' => false, 'match_key' => 'a bowl of chicken noodles', 'order' => 2],
                                    ['label' => null, 'option_text' => 'They saw', 'is_correct' => false, 'match_key' => 'a dolphin in the sea', 'order' => 3],
                                    ['label' => null, 'option_text' => 'We bought', 'is_correct' => false, 'match_key' => 'two storybooks at the bookstore', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for irregular past verbs!',
                                'explanation' => 'Sing -> sang (not singed).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sleep -> Slept', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Speak -> Spoke', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Sing -> Singed', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for past question forms!',
                                'explanation' => 'Did you see (base verb see).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '"Did you see the rainbow yesterday?" is correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '"Did you saw the rainbow yesterday?" is correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'The answer to "Did he buy a book?" can be "No, he didn\'t."', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik pada soal berikut dengan jawaban yang tepat dan ringkas.',
                        'order' => 2,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of the irregular verb "go" is ....',
                                'explanation' => 'Go -> went.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'went', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of the irregular verb "eat" is ....',
                                'explanation' => 'Eat -> ate.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'ate', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of the irregular verb "drink" is ....',
                                'explanation' => 'Drink -> drank.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'drank', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of the irregular verb "see" is ....',
                                'explanation' => 'See -> saw.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'saw', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of the irregular verb "buy" is ....',
                                'explanation' => 'Buy -> bought.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bought', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the sentence: "Did you ... (take) my pencil case yesterday?"',
                                'explanation' => 'Base form: take.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'take', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the sentence: "They ... (not go) to school yesterday because it was a holiday."',
                                'explanation' => 'didn\'t go (or did not go).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'didn\'t go', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau alasan logis yang lengkap.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'List five common irregular verbs used in everyday English, and provide their base form (V1), past form (V2), and an example sentence in the Simple Past Tense for each verb!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. Go -> Went: "We went to the beach last Sunday."
2. Eat -> Ate: "He ate a plate of fried noodles for breakfast."
3. Drink -> Drank: "She drank fresh orange juice yesterday."
4. Buy -> Bought: "My father bought a new helmet two days ago."
5. See -> Saw: "They saw a beautiful rainbow in the sky yesterday afternoon."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Correct the grammatical mistakes in the following sentences so that they follow the rules of the Simple Past Tense!
a. Yesterday, my brother drinked a glass of iced tea.
b. Did she went to the library yesterday morning?
c. They didn\'t bought any souvenirs at the market.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
a. Correction: "Yesterday, my brother drank a glass of iced tea." (drinked -> drank)
b. Correction: "Did she go to the library yesterday morning?" (went -> go, after Did use base form)
c. Correction: "They didn\'t buy any souvenirs at the market." (bought -> buy, after didn\'t use base form)',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Write a short recount paragraph (3-4 sentences) about what you ate and drank yesterday, using at least two irregular past verbs (such as ate, drank, had, bought)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
Sample Paragraph:
"Yesterday morning, I ate toasted bread with strawberry jam for breakfast. Then, I drank a glass of warm chocolate milk before going to school. In the afternoon, my mother bought delicious chicken satay, and we ate dinner together happily."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Unit 1 Bahasa Inggris Kelas 6 (Paket 3 - Past Questions & Dialogues)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Unit 1 bagian 3: Menyusun kalimat tanya lampau (Did you...? / Wh- questions), jawaban singkat, dan percakapan interaktif.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: A Conversation About Yesterday\'s Science Project', 'content' => '[Keterangan Gambar: Dua siswa SD (Rani dan Kevin) sedang berbincang di kantin sekolah saat jam istirahat: Rani memegang buku catatan sains dan bertanya tentang hasil eksperimen Kevin kemarin.]

Rani : "Hi, Kevin! Where were you yesterday afternoon? I called you, but you didn\'t answer."
Kevin : "Hi, Rani! I was in the school science lab. My group conducted an experiment on plant photosynthesis."
Rani : "That sounds exciting! Did you finish the experiment successfully?"
Kevin : "Yes, we did. We observed green leaves under a microscope and recorded the data. What did you do yesterday?"
Rani : "I visited the municipal library. I borrowed two books about renewable energy for our group presentation next week."'],
                            ['title' => 'Stimulus 2: Forming Wh- Questions in the Simple Past Tense', 'content' => '[Keterangan Gambar: Pola kalimat tanya Wh- Simple Past Tense: Wh- Word (What / Where / When / Why / Who / How) + did + Subject + Base Verb (V1) + Complement? Contoh: What did you eat? Where did you go? When did they arrive?]

When asking for specific information about past events, we use Wh- question words. The auxiliary verb *did* always comes before the subject, and the main verb must be in its base form (V1). For yes/no questions, we start with *Did + subject + base verb?* and answer with *Yes, I did* or *No, I didn\'t*.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Based on Stimulus 1, where was Kevin yesterday afternoon?',
                                'explanation' => 'Kevin was in the school science lab.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'He was in the school science lab conducting an experiment.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'He was sleeping at home.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'He was playing video games in his bedroom.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'He was shopping at the mall.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What did Rani do yesterday afternoon?',
                                'explanation' => 'Rani visited the municipal library and borrowed books.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'She visited the municipal library and borrowed two books.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'She helped her mother cook lunch in the kitchen.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'She played badminton with her friends.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'She repaired her bicycle in the garage.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO questions from the dialogue that ask about past events!',
                                'explanation' => 'Both questions ask about past events using past tense forms.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '"Where were you yesterday afternoon?"', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '"What did you do yesterday?"', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '"What is your favorite color?"', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '"Where do you live?"', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match each question from the dialogue with its correct response!',
                                'explanation' => 'Pairs of questions and answers from dialogue.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '"Where were you yesterday afternoon?"', 'is_correct' => false, 'match_key' => '"I was in the school science lab."', 'order' => 1],
                                    ['label' => null, 'option_text' => '"Did you finish the experiment?"', 'is_correct' => false, 'match_key' => '"Yes, we did."', 'order' => 2],
                                    ['label' => null, 'option_text' => '"What did you do yesterday?"', 'is_correct' => false, 'match_key' => '"I visited the municipal library."', 'order' => 3],
                                    ['label' => null, 'option_text' => '"Why didn\'t you answer the call?"', 'is_correct' => false, 'match_key' => '"Because I was busy doing experiments."', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What is the correct word order for a past Wh- question?',
                                'explanation' => 'Pattern: Wh- Word + did + Subject + V1.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Wh- Word + did + subject + base verb?', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Wh- Word + subject + did + past verb?', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Did + Wh- Word + subject + verb?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Wh- Word + was + subject + base verb?', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Choose the correct question to ask about someone\'s destination last holiday:',
                                'explanation' => 'Where did you go last holiday? (use base verb go).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Where did you go last holiday?', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Where did you went last holiday?', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Where do you went last holiday?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Where you went last holiday?', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for Simple Past question rules!',
                                'explanation' => 'Why did you cry (base verb cry, not cried).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'In "What did you see?", the verb "see" is in base form (V1).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'The answer to "Did you sleep well?" can be "Yes, I did."', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => '"Why did you cried?" is grammatically correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What question word asks about the time of an event in the past?',
                                'explanation' => 'When asks about time.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'When', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Where', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Who', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'What', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '... did you do last night? - I watched an animation movie.',
                                'explanation' => 'What asks about an activity/object.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'What', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Where', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Who', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'When', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '... did you go to Yogyakarta? - We went by train.',
                                'explanation' => 'How asks about transportation/manner.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'How', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Why', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Who', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'What', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '... did they arrive at the campsite? - They arrived at 10 a.m.',
                                'explanation' => 'When asks about time.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'When', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Where', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Who', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Why', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '... did you meet at the library? - I met my teacher, Pak Budi.',
                                'explanation' => 'Who asks about person.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Who', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'What', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Where', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'When', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '... did he stay at home yesterday? - Because he had a fever.',
                                'explanation' => 'Why asks about reason/cause.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Why', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'How', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'What', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Where', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Did your mother ... a delicious soup yesterday?',
                                'explanation' => 'Did + S + base verb cook.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'cook', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'cooked', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'cooking', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'cooks', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO correct past questions!',
                                'explanation' => 'Both questions correctly use base verbs with did.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'What did you buy at the supermarket?', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Did you finish your project on time?', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'What did you bought yesterday?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Did you finished your homework?', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO short answers for the question: "Did you watch the match?"',
                                'explanation' => 'Standard short answers: Yes, I did / No, I didn\'t.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Yes, I did.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'No, I didn\'t.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Yes, I watched.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'No, I don\'t.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the Wh- question word with the type of information it asks for!',
                                'explanation' => 'Pairs of question words and information types.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'What', 'is_correct' => false, 'match_key' => 'Thing or action', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Where', 'is_correct' => false, 'match_key' => 'Place or location', 'order' => 2],
                                    ['label' => null, 'option_text' => 'When', 'is_correct' => false, 'match_key' => 'Time or date', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Why', 'is_correct' => false, 'match_key' => 'Reason or explanation', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the question with the most appropriate answer!',
                                'explanation' => 'Pairs of questions and answers.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Did you sleep early last night?', 'is_correct' => false, 'match_key' => 'Yes, I went to bed at 9 p.m.', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Where did you buy that hat?', 'is_correct' => false, 'match_key' => 'I bought it at the night market.', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Who helped you paint the wall?', 'is_correct' => false, 'match_key' => 'My brother helped me.', 'order' => 3],
                                    ['label' => null, 'option_text' => 'How did you travel to Bandung?', 'is_correct' => false, 'match_key' => 'We took the high-speed train.', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for past dialogue sentences!',
                                'explanation' => 'Subject question "Who broke the vase?" does not need did.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '"Did you see my glasses?" - "Yes, I did."', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '"Where did you went?" is grammatically correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => '"Who broke the vase?" uses the past verb broke directly.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for time expressions!',
                                'explanation' => 'Tomorrow refers to future, not past.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '"Last weekend" is used for past actions.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '"Tomorrow morning" is used for past actions.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => '"Two days ago" refers to the past.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik pada soal berikut dengan jawaban yang tepat dan ringkas.',
                        'order' => 2,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the question word: "... did you go yesterday?" - "I went to the beach."',
                                'explanation' => 'Where asks about place.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Where', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the question word: "... did she cry?" - "Because she lost her doll."',
                                'explanation' => 'Why asks about reason.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Why', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the short answer: "Did you eat breakfast?" - "Yes, I ... ."',
                                'explanation' => 'Yes, I did.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the short answer: "Did they win the match?" - "No, they ... ."',
                                'explanation' => 'No, they didn\'t.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'didn\'t', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The base form of the verb in: "Where did you ... (buy) this shirt?" is ....',
                                'explanation' => 'Buy.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'buy', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the question word: "... did you arrive?" - "At 7 o\'clock."',
                                'explanation' => 'When asks about time.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'When', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the question word: "... baked this cake?" - "My mother did."',
                                'explanation' => 'Who asks about person.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Who', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau alasan logis yang lengkap.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Write three Wh- questions in the Simple Past Tense to ask a friend about their weekend activities (asking about WHAT they did, WHERE they went, and WHO they met), and provide sample answers for each question!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. What: "What did you do last Saturday?"
   Answer: "I cleaned my bedroom and rode my bicycle around the park."
2. Where: "Where did you go yesterday afternoon?"
   Answer: "I went to the public library with my sister."
3. Who: "Who did you meet at the sports center?"
   Answer: "I met my classmates, Kevin and Budi."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Create a short dialogue (4-6 lines) between two friends talking about what they did yesterday afternoon using both regular and irregular past verbs and at least one past question!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
Sample Dialogue:
Alex: "Hi, Brian! What did you do yesterday afternoon?"
Brian: "Hi, Alex! I helped my father in the garage. We washed the car and fixed my bicycle."
Alex: "Did you finish all the work before sunset?"
Brian: "Yes, we did. After that, we drank fresh lemon juice. What about you?"
Alex: "I visited my grandparents in the village and ate delicious fried bananas with them."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Rearrange the jumbled words into correct Simple Past Tense sentences!
a. yesterday / did / buy / what / you / the / market / at / ?
b. didn\'t / last / watch / TV / night / they / .
c. we / park / played / the / in / afternoon / yesterday / .',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
a. "What did you buy at the market yesterday?"
b. "They didn\'t watch TV last night."
c. "We played in the park yesterday afternoon."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
