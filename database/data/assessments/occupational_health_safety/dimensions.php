<?php

return [
    [
        'name_ar' => 'الوعي بمفاهيم السلامة والصحة المهنية',
        'max_score' => 10,
        'order_index' => 0,
        'questions' => [
            [
                'text_ar' => 'أدرك أهمية تطبيق إجراءات السلامة في بيئة العمل',
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
                'text_ar' => 'أعرف المخاطر المحتملة المرتبطة بطبيعة عملي',
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
                'text_ar' => 'أفهم التعليمات الخاصة بالسلامة المهنية في المؤسسة',
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
                'text_ar' => 'أعرف إجراءات الإبلاغ عن الحوادث والإصابات',
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
                'text_ar' => 'أدرك مسؤولياتي الشخصية تجاه السلامة المهنية',
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
                'low_threshold' => 7,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تتمتع بمستوى مرتفع من الوعي بمفاهيم السلامة والصحة المهنية، وتدرك المخاطر المحتملة في بيئة العمل، كما أنك قادر على فهم الإجراءات الوقائية وتطبيقها بصورة صحيحة.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تمتلك معرفة مقبولة بمفاهيم السلامة والصحة المهنية، وتدرك بعض المخاطر المرتبطة بعملك، إلا أنك لا تزال بحاجة إلى تعميق فهمك وربط المعرفة النظرية بالمواقف العملية التي تواجهها في بيئة العمل.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك بحاجة إلى تعزيز معرفتك بمفاهيم السلامة والصحة المهنية. وقد تواجه صعوبة في التعرف على المخاطر المهنية أو فهم الإجراءات الوقائية المناسبة في بيئة العمل. كما قد يؤدي نقص المعرفة إلى زيادة احتمالية التعرض للحوادث أو اتخاذ قرارات غير آمنة أثناء العمل.'
            ]
        ]
    ],
    [
        'name_ar' => 'الالتزام بإجراءات السلامة',
        'max_score' => 10,
        'order_index' => 1,
        'questions' => [
            [
                'text_ar' => 'ألتزم باستخدام معدات الوقاية الشخصية عند الحاجة',
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
                'text_ar' => 'أطبق تعليمات السلامة أثناء أداء العمل',
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
                'text_ar' => 'أتجنب السلوكيات التي قد تسبب حوادث مهنية',
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
                'text_ar' => 'أشارك في الأنشطة المتعلقة بالسلامة المهنية',
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
                'text_ar' => 'ألتزم بإرشادات الطوارئ والإخلاء',
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
                'low_threshold' => 7,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك ملتزم بإجراءات السلامة بشكل واضح ومستمر، وتحرص على تطبيق التعليمات الوقائية والمحافظة على سلامتك وسلامة الآخرين أثناء العمل.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تلتزم بإجراءات السلامة في كثير من المواقف، إلا أن التزامك قد يختلف باختلاف الظروف أو طبيعة العمل. وتحتاج إلى تعزيز الممارسات الوقائية حتى تصبح جزءًا ثابتًا من سلوكك المهني اليومي.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك لا تطبق إجراءات السلامة بصورة منتظمة، وقد تتجاهل بعض التعليمات أو الممارسات الوقائية المهمة. وهذا قد يعرضك وزملاءك لمخاطر وإصابات يمكن تجنبها.'
            ]
        ]
    ],
    [
        'name_ar' => 'بيئة العمل الآمنة',
        'max_score' => 10,
        'order_index' => 2,
        'questions' => [
            [
                'text_ar' => 'تتوفر في مكان العمل وسائل السلامة الأساسية',
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
                'text_ar' => 'تتم صيانة المعدات والأجهزة بشكل دوري',
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
                'text_ar' => 'توجد مخارج طوارئ واضحة وسهلة الوصول',
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
                'text_ar' => 'تتوفر لوحات وإرشادات السلامة في أماكن مناسبة',
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
                'text_ar' => 'يتم التخلص من المخلفات بطريقة آمنة',
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
                'low_threshold' => 7,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تمتلك وعيًا جيدًا بعناصر السلامة في بيئة العمل، وتستطيع ملاحظة المخاطر المحتملة والمساهمة في المحافظة على بيئة عمل آمنة.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تدرك العديد من عناصر السلامة الموجودة في بيئة العمل، إلا أنك قد لا تتمكن دائمًا من تقييم مدى كفايتها أو الإبلاغ عن المخاطر المحتملة بالشكل المناسب.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك قد تواجه صعوبة في التعرف على عناصر السلامة الموجودة في بيئة العمل أو ملاحظة أوجه القصور التي قد تؤثر في سلامتك وسلامة الآخرين.'
            ]
        ]
    ],
    [
        'name_ar' => 'الاستعداد للطوارئ وإدارة المخاطر',
        'max_score' => 10,
        'order_index' => 3,
        'questions' => [
            [
                'text_ar' => 'أعرف إجراءات التعامل مع الحرائق',
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
                'text_ar' => 'أعرف كيفية استخدام أدوات الإطفاء الأولية',
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
                'text_ar' => 'أشارك في تدريبات الإخلاء والطوارئ',
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
                'text_ar' => 'أستطيع التصرف بصورة مناسبة عند حدوث حادث',
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
                'text_ar' => 'أعرف الجهات المسؤولة عن إدارة الأزمات والطوارئ',
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
                'low_threshold' => 7,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك مستعد بدرجة جيدة للتعامل مع حالات الطوارئ، وتمتلك القدرة على التصرف السليم في المواقف الحرجة وتقليل آثارها السلبية.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تمتلك معرفة أساسية بإجراءات الطوارئ، إلا أنك تحتاج إلى مزيد من التدريب العملي والتطبيقات الميدانية لرفع مستوى جاهزيتك.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك قد لا تعرف الإجراءات المناسبة للتعامل مع الحوادث أو الطوارئ، وقد تواجه صعوبة في اتخاذ القرارات السريعة والصحيحة في المواقف الحرجة.'
            ]
        ]
    ],
    [
        'name_ar' => 'الثقافة التنظيمية للسلامة',
        'max_score' => 10,
        'order_index' => 4,
        'questions' => [
            [
                'text_ar' => 'تشجع الإدارة العاملين على الالتزام بالسلامة المهنية',
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
                'text_ar' => 'تتم مناقشة قضايا السلامة بشكل دوري',
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
                'text_ar' => 'يتم التعامل بجدية مع المخاطر المهنية المُبلَّغ عنها',
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
                'text_ar' => 'تتوفر برامج تدريبية منتظمة في السلامة المهنية',
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
                'text_ar' => 'يسود التعاون بين العاملين لتعزيز بيئة عمل آمنة',
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
                'low_threshold' => 7,
                'high_threshold' => 10,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تسهم بفاعلية في دعم ثقافة السلامة داخل المؤسسة، وتشجع الآخرين على الالتزام بالممارسات الآمنة، وتدرك أهمية العمل الجماعي في الحد من المخاطر المهنية.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تدعم ممارسات السلامة بدرجة مقبولة، إلا أنك تحتاج إلى زيادة مشاركتك وتأثيرك الإيجابي في نشر ثقافة السلامة بين زملائك.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أن دورك في دعم ثقافة السلامة داخل المؤسسة ما زال محدودًا، وقد لا تشارك بصورة فعالة في الأنشطة أو المبادرات المتعلقة بالسلامة المهنية.'
            ]
        ]
    ]
];
