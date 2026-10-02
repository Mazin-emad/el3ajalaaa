<?php

return [
    [
        'name_ar' => 'الوعي بالذات',
        'max_score' => 10,
        'order_index' => 0,
        'questions' => [
            [
                'text_ar' => 'أعرف نقاط قوتي بوضوح.',
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
                'text_ar' => 'أستطيع تحديد نقاط الضعف التي أحتاج إلى تطويرها.',
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
                'text_ar' => 'أفهم الأسباب التي تدفعني لاتخاذ قراراتي.',
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
                'text_ar' => 'أستطيع وصف شخصيتي للآخرين بدقة.',
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
                'text_ar' => 'أدرك تأثير مشاعري على سلوكي.',
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
                'low_threshold' => 8,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تمتلك فهمًا واضحًا لذاتك، وتعرف نقاط قوتك وضعفك، وتدرك دوافعك الشخصية وأسباب سلوكياتك المختلفة. كما تتمتع بقدرة جيدة على تقييم نفسك بصورة واقعية واتخاذ قرارات تتوافق مع إمكاناتك وقدراتك.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 7,
                'interpretation_text_ar' => 'تشير نتيجتك إلى امتلاكك معرفة عامة بذاتك، إلا أن بعض الجوانب الشخصية قد لا تكون واضحة بشكل كافٍ. فقد تدرك بعض نقاط قوتك وضعفك، لكنك تحتاج إلى مزيد من التأمل الذاتي لفهم أعمق لدوافعك وسلوكياتك.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى صعوبة في فهم الذات وتحديد الخصائص الشخصية والدوافع الداخلية. وقد تواجه صعوبة في تقييم إمكاناتك أو تفسير سلوكياتك، مما قد يؤثر في جودة قراراتك وقدرتك على التعامل مع المواقف المختلفة.'
            ]
        ]
    ],
    [
        'name_ar' => 'الوعي الانفعالي',
        'max_score' => 10,
        'order_index' => 1,
        'questions' => [
            [
                'text_ar' => 'أستطيع التعرف على مشاعري عندما أشعر بها.',
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
                'text_ar' => 'أعرف ما الذي يسبب لي التوتر أو القلق.',
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
                'text_ar' => 'أستطيع التعبير عن مشاعري بطريقة مناسبة.',
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
                'text_ar' => 'ألاحظ التغيرات في حالتي النفسية بسرعة.',
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
                'text_ar' => 'أفهم كيف تؤثر مشاعري على علاقاتي مع الآخرين.',
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
                'low_threshold' => 8,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى قدرتك على التعرف على مشاعرك وفهم أسبابها والتعبير عنها بصورة مناسبة، مع قدرتك الجيدة على ضبط الانفعالات وإدارتها في المواقف المختلفة.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 7,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تستطيع إدراك بعض مشاعرك وانفعالاتك، لكنك قد تواجه صعوبة أحيانًا في فهم أسبابها أو التحكم فيها بشكل كامل، خاصة في المواقف الضاغطة.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى ضعف القدرة على التعرف على المشاعر أو فهمها، وقد تواجه صعوبات في التعبير عن انفعالاتك أو تنظيمها، مما قد يؤثر في تفاعلاتك وعلاقاتك مع الآخرين.'
            ]
        ]
    ],
    [
        'name_ar' => 'القيم والأهداف',
        'max_score' => 10,
        'order_index' => 2,
        'questions' => [
            [
                'text_ar' => 'لدي قيم ومبادئ واضحة ألتزم بها.',
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
                'text_ar' => 'أعرف ما الذي أريده من حياتي على المدى البعيد.',
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
                'text_ar' => 'أتخذ قراراتي بما يتوافق مع قيمي الشخصية.',
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
                'text_ar' => 'لدي أهداف محددة أسعى لتحقيقها.',
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
                'text_ar' => 'أراجع أهدافي بشكل دوري.',
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
                'low_threshold' => 8,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى وضوح القيم والمبادئ الشخصية لديك، وامتلاكك أهدافًا محددة تسعى لتحقيقها. كما تتميز بالقدرة على اتخاذ قرارات تتوافق مع قناعاتك وتوجهاتك المستقبلية.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 7,
                'interpretation_text_ar' => 'تشير نتيجتك إلى وجود بعض القيم والأهداف لديك، إلا أنها قد لا تكون محددة أو واضحة بصورة كافية. وقد تحتاج إلى إعادة ترتيب أولوياتك وتحديد أهدافك بشكل أكثر دقة.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى غموض في القيم أو الأهداف الشخصية، وقد تجد صعوبة في تحديد اتجاهاتك المستقبلية أو اتخاذ قرارات مبنية على مبادئ واضحة، مما يؤدي إلى التردد أو فقدان الشعور بالاتجاه.'
            ]
        ]
    ],
    [
        'name_ar' => 'العلاقات الاجتماعية',
        'max_score' => 10,
        'order_index' => 3,
        'questions' => [
            [
                'text_ar' => 'أعرف كيف يراني الآخرون بشكل عام.',
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
                'text_ar' => 'أتقبل الملاحظات والنقد البناء.',
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
                'text_ar' => 'أفهم تأثير تصرفاتي على الآخرين.',
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
                'text_ar' => 'أستطيع بناء علاقات إيجابية مع من حولي.',
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
                'text_ar' => 'أوازن بين احتياجاتي الشخصية واحتياجات الآخرين.',
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
                'low_threshold' => 8,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى قدرتك الجيدة على بناء العلاقات الإيجابية والمحافظة عليها، وفهم مشاعر الآخرين واحترام آرائهم، إضافة إلى امتلاك مهارات تواصل فعالة وتقبل النقد البناء.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 7,
                'interpretation_text_ar' => 'تشير نتيجتك إلى قدرة مقبولة على التفاعل الاجتماعي، مع وجود بعض التحديات في التواصل أو إدارة العلاقات في بعض المواقف الاجتماعية.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى صعوبات في التواصل مع الآخرين أو فهم احتياجاتهم ومشاعرهم، وقد يؤدي ذلك إلى ضعف العلاقات الاجتماعية أو حدوث مشكلات متكررة في التفاعل الاجتماعي.'
            ]
        ]
    ],
    [
        'name_ar' => 'التطور الشخصي',
        'max_score' => 10,
        'order_index' => 4,
        'questions' => [
            [
                'text_ar' => 'أسعى باستمرار لتطوير نفسي.',
                'order_index' => 20,
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
                'text_ar' => 'أتعلم من أخطائي السابقة.',
                'order_index' => 21,
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
                'text_ar' => 'أراجع سلوكي بعد المواقف المهمة.',
                'order_index' => 22,
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
                'text_ar' => 'أبحث عن فرص جديدة للنمو الشخصي.',
                'order_index' => 23,
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
                'text_ar' => 'أشعر أنني أتطور مع مرور الوقت.',
                'order_index' => 24,
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
                'low_threshold' => 8,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى حرصك المستمر على تطوير ذاتك وتحسين مهاراتك والاستفادة من خبراتك السابقة. كما تتميز بالقدرة على التعلم من الأخطاء والسعي المستمر للنمو الشخصي والمهني.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 7,
                'interpretation_text_ar' => 'تشير نتيجتك إلى وجود رغبة في التطور وتحسين الذات، إلا أن الجهود المبذولة قد تكون غير منتظمة أو محدودة، مما يجعل عملية النمو الشخصي أبطأ أو أقل وضوحًا.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى ضعف الاهتمام بتطوير الذات أو الاستفادة من الخبرات السابقة، وقد تميل إلى تكرار الأخطاء أو مقاومة التغيير، مما يحد من فرص النمو والتقدم الشخصي.'
            ]
        ]
    ]
];
