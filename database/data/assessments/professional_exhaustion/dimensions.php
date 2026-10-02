<?php

return [
    [
        'name_ar' => 'الإجهاد والإنهاك النفسي',
        'max_score' => 10,
        'order_index' => 0,
        'questions' => [
            [
                'text_ar' => 'أشعر بالتعب والإرهاق في نهاية يوم العمل.',
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
                'text_ar' => 'أجد صعوبة في استعادة نشاطي بعد ساعات العمل.',
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
                'text_ar' => 'أشعر بأن متطلبات العمل تفوق طاقتي.',
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
                'text_ar' => 'أعاني من التوتر بسبب ضغوط العمل.',
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
                'text_ar' => 'أشعر بالإجهاد حتى قبل بدء يوم العمل.',
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
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك قادر على التعامل مع متطلبات العمل بكفاءة، وتتمتع بمستوى جيد من الطاقة النفسية والانفعالية، ولا تعاني من ضغوط مهنية مؤثرة.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى وجود بعض مظاهر التعب والإجهاد المرتبط بالعمل، إلا أنها ما تزال ضمن الحدود التي يمكن السيطرة عليها من خلال تحسين مهارات إدارة الضغوط وتنظيم العمل.'
            ],
            [
                'level' => 'high',
                'low_threshold' => 7,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى تعرضك لاستنزاف نفسي وعاطفي مرتفع نتيجة ضغوط العمل المستمرة، مما قد يؤثر في صحتك النفسية ومستوى أدائك المهني إذا لم يتم التدخل المناسب. ومن مظاهر ذلك: الشعور بالتعب المستمر، وانخفاض مستوى الطاقة والنشاط، والتوتر والقلق المرتبطان بالعمل، وصعوبة الاسترخاء بعد انتهاء ساعات العمل، والشعور بأن أعباء العمل تفوق القدرة على التحمل.\n\nوارتفاع درجتك في هذا البعد يدل على أنك تعاني من استنزاف نفسي وعاطفي متزايد نتيجة الضغوط المهنية، وتحتاج إلى استراتيجيات فعالة لإدارة الضغوط وتحسين التوازن بين متطلبات العمل والموارد الشخصية.'
            ]
        ]
    ],
    [
        'name_ar' => 'التبلد والانفصال عن العمل',
        'max_score' => 10,
        'order_index' => 1,
        'questions' => [
            [
                'text_ar' => 'أصبحت أقل حماسًا للعمل مقارنة بالسابق.',
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
                'text_ar' => 'أشعر بأن عملي أصبح روتينيًا ومملًا.',
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
                'text_ar' => 'أجد نفسي أقل اهتمامًا بمشكلات المستفيدين أو العملاء.',
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
                'text_ar' => 'أشعر برغبة في تجنب بعض مهام العمل.',
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
                'text_ar' => 'أشعر أحيانًا بعدم الانتماء لبيئة العمل.',
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
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى وجود ارتباط إيجابي بالعمل، واستمرار الحماس والاهتمام بالمهام المهنية وبالمستفيدين أو الزملاء.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى ظهور بعض مظاهر الفتور أو انخفاض الحماس تجاه العمل، مع بقاء القدرة على أداء المهام والمحافظة على العلاقات المهنية المقبولة.'
            ],
            [
                'level' => 'high',
                'low_threshold' => 7,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى وجود اتجاهات سلبية واضحة نحو العمل، وانخفاض الانتماء المهني، والرغبة في تجنب المسؤوليات أو تقليل التفاعل مع الآخرين في بيئة العمل. ومن مظاهر ذلك: ضعف الدافعية المهنية، وانخفاض الاهتمام بالعمل أو بالمستفيدين، والشعور بالملل والروتين، والرغبة في تجنب بعض المسؤوليات المهنية، وضعف الشعور بالانتماء للمؤسسة.\n\nوتشير الدرجة المرتفعة إلى وجود حالة من الانفصال النفسي عن العمل قد تؤثر في جودة الأداء والعلاقات المهنية، وقد تكون مؤشرًا على تطور الإرهاق المهني إلى مراحل أكثر تقدمًا.'
            ]
        ]
    ],
    [
        'name_ar' => 'انخفاض الإنجاز المهني',
        'max_score' => 10,
        'order_index' => 2,
        'questions' => [
            [
                'text_ar' => 'أشعر أن إنتاجيتي أقل مما ينبغي.',
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
                'text_ar' => 'أشك في قدرتي على أداء عملي بكفاءة.',
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
                'text_ar' => 'أجد صعوبة في تحقيق أهداف العمل المطلوبة.',
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
                'text_ar' => 'أشعر بأن جهودي لا تحقق نتائج ملموسة.',
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
                'text_ar' => 'أشعر بأن أدائي المهني يتراجع مع الوقت.',
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
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى شعورك بالكفاءة المهنية والثقة بقدراتك، وإدراكك أنك تحقق أهدافك المهنية بصورة مرضية.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى وجود بعض الشكوك حول مستوى أدائك أو قدرتك على الإنجاز، مع إمكانية تحسين الوضع من خلال الدعم والتطوير المهني.'
            ],
            [
                'level' => 'high',
                'low_threshold' => 7,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى شعور متزايد بعدم الكفاءة المهنية وضعف الإنجاز، وتراجع الثقة بالقدرة على أداء المهام وتحقيق الأهداف المطلوبة. ومن مظاهر ذلك: ضعف الشعور بالنجاح المهني، وانخفاض الثقة بالقدرات الوظيفية، والشعور بعدم الكفاءة، والإحساس بأن الجهود المبذولة غير مجدية، وصعوبة تحقيق الأهداف المهنية.\n\nوتدل هذه النتيجة على أنك أصبحت تنظر إلى أدائك المهني بصورة سلبية، مما قد ينعكس على مستوى الإنجاز والإبداع والرضا الوظيفي.'
            ]
        ]
    ],
    [
        'name_ar' => 'الأعراض الجسدية المرتبطة بالعمل',
        'max_score' => 10,
        'order_index' => 3,
        'questions' => [
            [
                'text_ar' => 'أعاني من الصداع أو آلام جسدية مرتبطة بضغوط العمل.',
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
                'text_ar' => 'أواجه اضطرابات في النوم بسبب التفكير في العمل.',
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
                'text_ar' => 'أشعر بإرهاق جسدي متكرر أثناء العمل.',
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
                'text_ar' => 'أعاني من ضعف التركيز خلال ساعات العمل.',
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
                'text_ar' => 'أشعر بأن ضغوط العمل تؤثر في صحتي العامة.',
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
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أن ضغوط العمل لا تترك آثارًا جسدية ملحوظة، وأن حالتك الصحية العامة مستقرة نسبيًا.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى وجود بعض الأعراض الجسدية المرتبطة بالعمل، مثل التعب أو الصداع أو اضطرابات النوم بشكل متقطع.'
            ],
            [
                'level' => 'high',
                'low_threshold' => 7,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى تأثر صحتك الجسدية بشكل واضح بضغوط العمل، وظهور أعراض متكررة قد تؤثر في جودة حياتك وأدائك المهني وتتطلب اهتمامًا أكبر بالصحة والرفاه المهني. ومن مظاهر ذلك: الصداع المتكرر، واضطرابات النوم، والشعور بالإرهاق الجسدي، وضعف التركيز والانتباه، والشكاوى الصحية المرتبطة بالعمل.\n\nوتعكس الدرجة المرتفعة انتقال آثار الضغوط المهنية إلى الجانب الجسدي، مما قد يؤثر في صحتك العامة ويستدعي الاهتمام بإجراءات الوقاية والرعاية الصحية والنفسية.'
            ]
        ]
    ]
];
