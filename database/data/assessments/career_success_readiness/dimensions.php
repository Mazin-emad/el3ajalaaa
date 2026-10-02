<?php

return [
    [
        'name_ar' => 'الكفاءة المهنية',
        'max_score' => 10,
        'order_index' => 0,
        'questions' => [
            [
                'text_ar' => 'أمتلك المهارات اللازمة لأداء مهام عملي بكفاءة.',
                'order_index' => 0,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أستطيع حل المشكلات التي تواجهني أثناء العمل.',
                'order_index' => 1,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أتعلم بسرعة أي مهارات جديدة تتطلبها الوظيفة.',
                'order_index' => 2,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أشعر بالثقة عند تنفيذ مسؤولياتي الوظيفية.',
                'order_index' => 3,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أحقق الأهداف المطلوبة مني في العمل.',
                'order_index' => 4,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ]
        ],
        'interpretations' => [
            [
                'level' => 'high',
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تمتلك مهارات ومعارف مهنية جيدة، وتستطيع أداء مهامك الوظيفية بكفاءة، كما أنك قادر على التعامل مع المشكلات المهنية وإيجاد الحلول المناسبة لها.',
                'high_threshold' => 40,
                'low_threshold' => 8
            ],
            [
                'level' => 'medium',
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تمتلك مستوى مقبولًا من المهارات والخبرات المهنية التي تمكنك من أداء مهامك الأساسية، إلا أنك ما زلت بحاجة إلى تطوير بعض الجوانب المهنية لزيادة كفاءتك.',
                'high_threshold' => 7,
                'low_threshold' => 4
            ],
            [
                'level' => 'low',
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تحتاج إلى تطوير بعض المهارات والمعارف المهنية المرتبطة بعملك. وقد تواجه صعوبة في التعامل مع بعض متطلبات الوظيفة أو حل المشكلات المهنية بكفاءة.',
                'high_threshold' => 3,
                'low_threshold' => 0
            ]
        ]
    ],
    [
        'name_ar' => 'الالتزام والانضباط',
        'max_score' => 10,
        'order_index' => 1,
        'questions' => [
            [
                'text_ar' => 'ألتزم بمواعيد الحضور والانصراف.',
                'order_index' => 5,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أنجز المهام المطلوبة في الوقت المحدد.',
                'order_index' => 6,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أتحمل مسؤولية أخطائي وأسعى لتصحيحها.',
                'order_index' => 7,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'ألتزم بقوانين وأنظمة جهة العمل.',
                'order_index' => 8,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أحرص على تقديم أفضل أداء ممكن باستمرار.',
                'order_index' => 9,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ]
        ],
        'interpretations' => [
            [
                'level' => 'high',
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك شخص ملتزم ومنضبط في عملك، وتحرص على أداء واجباتك المهنية وتحمل مسؤولياتك بكفاءة، مما يسهم في تعزيز نجاحك الوظيفي.',
                'high_threshold' => 40,
                'low_threshold' => 8
            ],
            [
                'level' => 'medium',
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تلتزم بدرجة مقبولة بالأنظمة والتعليمات الوظيفية، وتتحمل مسؤولياتك إلى حد معقول، مع إمكانية تعزيز مستوى الانضباط والالتزام لديك.',
                'high_threshold' => 7,
                'low_threshold' => 4
            ],
            [
                'level' => 'low',
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك قد تواجه صعوبة في الالتزام الكامل بمتطلبات العمل أو تحمل المسؤوليات الوظيفية بالشكل المطلوب، الأمر الذي قد يؤثر في مستوى أدائك المهني.',
                'high_threshold' => 3,
                'low_threshold' => 0
            ]
        ]
    ],
    [
        'name_ar' => 'العلاقات والتواصل',
        'max_score' => 10,
        'order_index' => 2,
        'questions' => [
            [
                'text_ar' => 'أستطيع التواصل بفعالية مع الزملاء.',
                'order_index' => 10,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أتقبل النقد البناء وأستفيد منه.',
                'order_index' => 11,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أعمل بروح الفريق عند الحاجة.',
                'order_index' => 12,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أتعامل باحترام مع جميع من أعمل معهم.',
                'order_index' => 13,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أستطيع التعبير عن أفكاري بوضوح في بيئة العمل.',
                'order_index' => 14,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ]
        ],
        'interpretations' => [
            [
                'level' => 'high',
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تمتلك مهارات جيدة في التواصل والتفاعل مع الآخرين، وتستطيع بناء علاقات مهنية إيجابية والعمل بروح الفريق، مما يدعم نجاحك في بيئة العمل.',
                'high_threshold' => 40,
                'low_threshold' => 8
            ],
            [
                'level' => 'medium',
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تمتلك مهارات تواصل مقبولة تساعدك على بناء علاقات مهنية مناسبة، إلا أنك قد تستفيد من تطوير قدرتك على التعاون والتفاعل مع الآخرين.',
                'high_threshold' => 7,
                'low_threshold' => 4
            ],
            [
                'level' => 'low',
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك قد تواجه بعض الصعوبات في التواصل مع الآخرين أو العمل ضمن فريق، الأمر الذي قد يؤثر في جودة علاقاتك المهنية.',
                'high_threshold' => 3,
                'low_threshold' => 0
            ]
        ]
    ],
    [
        'name_ar' => 'الدافعية والتطوير الذاتي',
        'max_score' => 10,
        'order_index' => 3,
        'questions' => [
            [
                'text_ar' => 'لدي رغبة مستمرة في تطوير نفسي مهنيًا.',
                'order_index' => 15,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أسعى لاكتساب خبرات جديدة في مجال عملي.',
                'order_index' => 16,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أبحث عن حلول مبتكرة لتحسين الأداء.',
                'order_index' => 17,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أستمتع بالتحديات المهنية الجديدة.',
                'order_index' => 18,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ],
            [
                'text_ar' => 'أؤمن بقدرتي على التقدم والنجاح في عملي.',
                'order_index' => 19,
                'options' => [
                    [
                        'label_ar' => 'نعم',
                        'score_value' => 2,
                        'order_index' => 0
                    ],
                    [
                        'label_ar' => 'إلى حد ما',
                        'score_value' => 1,
                        'order_index' => 1
                    ],
                    [
                        'label_ar' => 'لا',
                        'score_value' => 0,
                        'order_index' => 2
                    ]
                ]
            ]
        ],
        'interpretations' => [
            [
                'level' => 'high',
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تمتلك دافعية عالية نحو النجاح والتطور المهني، وتسعى باستمرار إلى تطوير مهاراتك وقدراتك واكتساب خبرات جديدة تساعدك على التميز في عملك.',
                'high_threshold' => 40,
                'low_threshold' => 8
            ],
            [
                'level' => 'medium',
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تمتلك دافعية معتدلة نحو التطور المهني، وتسعى أحيانًا إلى تحسين أدائك واكتساب خبرات جديدة، مع إمكانية زيادة اهتمامك بالتعلم المستمر.',
                'high_threshold' => 7,
                'low_threshold' => 4
            ],
            [
                'level' => 'low',
                'interpretation_text_ar' => 'تشير نتيجتك إلى أن رغبتك في التعلم والتطوير المهني قد تكون محدودة نسبيًا، وقد تحتاج إلى تعزيز دافعيتك نحو اكتساب مهارات وخبرات جديدة.',
                'high_threshold' => 3,
                'low_threshold' => 0
            ]
        ]
    ]
];
