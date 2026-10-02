<?php

return [
    [
        'name_ar' => 'العبء الوظيفي (كمية العمل)',
        'max_score' => 12,
        'order_index' => 0,
        'questions' => [
            [
                'text_ar' => 'تتغير المسئوليات في العمل باستمرار',
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
                'text_ar' => 'المهام الموكلة لي صعبة وغير واضحة',
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
                'text_ar' => 'أُكلَّف بتأدية عدة مهام ومسئوليات متنوعة في وقت واحد',
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
                'text_ar' => 'عدم الحصول على وقت للراحة أثناء الدوام الرسمي',
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
                'text_ar' => 'المهام التي يتطلب مني تأديتها تزداد تعقيدًا مع مرور الوقت',
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
            ],
            [
                'text_ar' => 'نقص التدريب والخبرة الكافيين لإنجاز الأعمال المطلوبة مني على الوجه الأكمل',
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
            ]
        ],
        'interpretations' => [
            [
                'level' => 'high',
                'low_threshold' => 9,
                'high_threshold' => 60,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تعاني من مستوى مرتفع من الضغوط المرتبطة بالعبء الوظيفي (كمية العمل). فكمية العمل الملقاة عليك تُعد من أبرز مؤشرات الضغوط التي تواجهها في بيئة العمل، إذ يتطلب منك العمل الزائد عن طاقتك بذل جهد متواصل والعمل لساعات طويلة دون الحصول على فترات راحة كافية، وهو ما يزيد من احتمالية الوقوع في الأخطاء المهنية والمساءلة من قِبل قياداتك، وقد يعرضك لمشكلات صحية مرتبطة بضغط العمل.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 8,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أن مستوى الضغوط المرتبطة بالعبء الوظيفي لديك متوسط. فكمية العمل التي تؤديها مناسبة إلى حد ما، ولا تمثل ضغطًا كبيرًا عليك، إذ يقع العمل غالبًا في حدود طاقتك ولا يستلزم منك جهدًا زائدًا متواصلًا أو ساعات عمل طويلة دون راحة.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى انخفاض مستوى الضغوط المرتبطة بالعبء الوظيفي لديك. فكمية العمل التي تؤديها مناسبة ولا تمثل مصدر ضغط في بيئة عملك، إذ يتناسب العمل مع طاقتك ولا يستلزم جهدًا إضافيًا متواصلًا أو ساعات عمل طويلة، وتحصل على فترات راحة كافية، مما يقلل من تعرضك للأخطاء المهنية أو المساءلة.'
            ]
        ]
    ],
    [
        'name_ar' => 'ظروف العمل',
        'max_score' => 10,
        'order_index' => 1,
        'questions' => [
            [
                'text_ar' => 'العمل شاق وصعب',
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
                'text_ar' => 'ساعات العمل طويلة',
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
                'text_ar' => 'الشعور بالملل من هذا العمل',
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
                'text_ar' => 'المسئولية الملقاة عليّ كبيرة',
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
            ],
            [
                'text_ar' => 'نقص الوسائل والأدوات اللازمة لأداء المهام',
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
            ]
        ],
        'interpretations' => [
            [
                'level' => 'high',
                'low_threshold' => 7,
                'high_threshold' => 60,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تعاني من مستوى مرتفع من الضغوط المرتبطة بظروف العمل، من حيث صعوبة العمل وشدته، وطول ساعات العمل، والشعور بالملل منه، إضافة إلى ثقل المسؤولية الملقاة عليك ونقص الوسائل والأدوات اللازمة لأداء مهامك.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أن مستوى الضغوط المرتبطة بظروف العمل لديك متوسط، فالعمل قد يكون شاقًا وطويل الساعات إلى حد ما، مع شعور محدود بالملل، ومسؤولية مناسبة نسبيًا، ونقص متوسط في الوسائل والأدوات اللازمة لأداء المهام.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى انخفاض مستوى الضغوط المرتبطة بظروف العمل، فالعمل غير شاق أو صعب بالنسبة لك، وساعات العمل مناسبة، ولا تشعر بالملل منه، والمسؤولية الملقاة عليك مناسبة، ولا تعاني من نقص في الوسائل والأدوات اللازمة لأداء مهامك.'
            ]
        ]
    ],
    [
        'name_ar' => 'صراع الدور',
        'max_score' => 10,
        'order_index' => 2,
        'questions' => [
            [
                'text_ar' => 'الأعمال التي أقوم بها بعيدة عن مجال خبراتي السابقة',
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
                'text_ar' => 'تتدخل الإدارة العليا في أداء عملي بشكل واضح',
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
                'text_ar' => 'هناك متطلبات متناقضة من جانب القيادة العليا في العمل',
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
                'text_ar' => 'الشعور بأن متطلبات العمل تتعارض مع واجباتي العائلية',
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
            ],
            [
                'text_ar' => 'الشعور بأن المهام التي أقوم بها غير ضرورية',
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
            ]
        ],
        'interpretations' => [
            [
                'level' => 'high',
                'low_threshold' => 7,
                'high_threshold' => 60,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تعاني من مستوى مرتفع من صراع الدور، حيث تقع عليك متطلبات متعارضة من رئيسك أو زملائك أو مرؤوسيك، وتوقعاتك في بيئة العمل حول السلوك المطلوب منك محدودة الوضوح، مع تداخل بين أدوارك الوظيفية وأدوارك الأسرية أو الاجتماعية، مما يخلق صراعًا داخليًا لديك ويزيد من التوتر وينخفض معه الرضا الوظيفي والثقة في الرؤساء والمنظمة.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أن مستوى صراع الدور لديك متوسط، فالمتطلبات الواقعة عليك من رئيسك أو زملائك أو مرؤوسيك مناسبة نسبيًا، وهناك تناسق إلى حد ما بين أدوارك الوظيفية وغير الوظيفية، مع تعارض متوسط بينها وبين أدوارك الأسرية أو الاجتماعية، مما يخلق صراعًا داخليًا محدودًا ورضا وظيفيًا متوسطًا.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى انخفاض مستوى صراع الدور لديك، فالمتطلبات الواقعة عليك من رئيسك أو زملائك أو مرؤوسيك غير متعارضة، وتوقعاتك في بيئة العمل واضحة، ولا يوجد تداخل أو تعارض يُذكر بين أدوارك الوظيفية وأدوارك الأسرية أو الاجتماعية، مما يمنحك استقرارًا ورضا وظيفيًا مناسبًا وثقة أكبر في الرؤساء والمنظمة.'
            ]
        ]
    ],
    [
        'name_ar' => 'غموض الدور',
        'max_score' => 10,
        'order_index' => 3,
        'questions' => [
            [
                'text_ar' => 'مسئولياتي في العمل غير محددة تحديدًا واضحًا',
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
                'text_ar' => 'القادة لا يتفهمون طبيعة عملي',
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
                'text_ar' => 'نوع العمل المطلوب مني القيام به غير محدد بوضوح',
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
                'text_ar' => 'الأنظمة والتعليمات غير واضحة ومتعددة',
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
            ],
            [
                'text_ar' => 'لا يوجد مسئول مباشر يتم الرجوع إليه عند الحاجة',
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
            ]
        ],
        'interpretations' => [
            [
                'level' => 'high',
                'low_threshold' => 7,
                'high_threshold' => 60,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تعاني من مستوى مرتفع من غموض الدور، إذ تكون معلوماتك المتعلقة بحدود سلطتك ومسؤولياتك وسياسات المنظمة وطرق التقييم المستخدمة محدودة، مع نقص في التغذية الراجعة عن أدائك، مما يؤدي إلى الحيرة والإحباط وزيادة التوتر وانخفاض الرضا الوظيفي والثقة بالنفس.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أن مستوى غموض الدور لديك متوسط، فمعلوماتك عن حدود سلطتك ومسؤولياتك وسياسات المنظمة وطرق التقييم متوسطة الوضوح، مع توفر بعض التغذية الراجعة عن أدائك، مما يسبب شعورًا بالضغط بدرجة متوسطة.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى انخفاض مستوى غموض الدور لديك، فمعلوماتك عن حدود سلطتك ومسؤولياتك وسياسات المنظمة وطرق التقييم واضحة، مع توافر التغذية الراجعة المناسبة عن أدائك، مما يمنحك شعورًا بالراحة والثقة بالنفس والرضا الوظيفي، ويزيد من استخدامك لمهاراتك الفكرية والإدارية.'
            ]
        ]
    ],
    [
        'name_ar' => 'التطور والترقي الوظيفي',
        'max_score' => 6,
        'order_index' => 4,
        'questions' => [
            [
                'text_ar' => 'الفرصة المناسبة للترقي في الجهة التي أعمل بها ضعيفة',
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
                'text_ar' => 'بقائي بهذه الوظيفة لا يخدم مستقبلي الوظيفي',
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
                'text_ar' => 'أشعر بأنني أعمل في وظيفة غير مناسبة لي',
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
            ]
        ],
        'interpretations' => [
            [
                'level' => 'high',
                'low_threshold' => 5,
                'high_threshold' => 6,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تعاني من مستوى مرتفع من الضغوط المرتبطة بالتطور والترقي الوظيفي، بسبب ضعف الفرص المناسبة للترقي في جهة عملك، وشعورك بأن بقاءك في هذه الوظيفة لا يخدم مستقبلك المهني، وأنك تعمل في وظيفة غير مناسبة لك، مما يولّد لديك قلقًا وخوفًا ومعاناة نتيجة غياب الضمان الوظيفي.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 3,
                'high_threshold' => 4,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أن مستوى الضغوط المرتبطة بالتطور والترقي الوظيفي لديك متوسط، فالفرص المتاحة للترقي محدودة إلى حد ما، وتشعر أن بقاءك في وظيفتك الحالية يخدم مستقبلك المهني بدرجة معقولة، دون قلق أو خوف كبيرين نتيجة الضمان الوظيفي.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 2,
                'interpretation_text_ar' => 'تشير نتيجتك إلى انخفاض مستوى الضغوط المرتبطة بالتطور والترقي الوظيفي لديك، فأنت لا تعاني من ضعف في فرص الترقي، وتشعر أن بقاءك في وظيفتك الحالية يخدم مستقبلك المهني، وأنك تعمل في وظيفة مناسبة لك، دون قلق أو خوف يُذكر نتيجة الضمان الوظيفي.'
            ]
        ]
    ],
    [
        'name_ar' => 'ضغوط اقتصادية',
        'max_score' => 12,
        'order_index' => 5,
        'questions' => [
            [
                'text_ar' => 'قلة العائد المادي مقارنة بأية وظيفة أخرى',
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
            ],
            [
                'text_ar' => 'العمل لا يوفر لي ولعائلتي التأمين الصحي المناسب',
                'order_index' => 25,
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
                'text_ar' => 'العائد المادي لا يتناسب مع الجهد المبذول',
                'order_index' => 26,
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
                'text_ar' => 'العائد المادي لا يتناسب مع مؤهلاتي وخبراتي',
                'order_index' => 27,
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
                'text_ar' => 'الرواتب لا تُصرف بانتظام',
                'order_index' => 28,
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
                'text_ar' => 'الحوافز المادية لا تكافئ المجتهد في عمله',
                'order_index' => 29,
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
                'low_threshold' => 9,
                'high_threshold' => 60,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أنك تعاني من مستوى مرتفع من الضغوط الاقتصادية المرتبطة بالعمل، فأنت تشعر بقلة العائد المادي مقارنة بوظائف أخرى، وبعدم توفير تأمين صحي مناسب لك ولعائلتك، وبأن العائد المادي لا يتناسب مع الجهد المبذول أو مع مؤهلاتك وخبراتك، إضافة إلى عدم انتظام صرف الرواتب وعدم كفاية الحوافز المادية للمجتهدين.'
            ],
            [
                'level' => 'medium',
                'low_threshold' => 4,
                'high_threshold' => 8,
                'interpretation_text_ar' => 'تشير نتيجتك إلى أن مستوى الضغوط الاقتصادية لديك متوسط، فأنت تشعر ببعض قلة العائد المادي مقارنة بوظائف أخرى، وبعض القصور في التأمين الصحي المقدم لك ولعائلتك، مع تناسب نسبي بين العائد المادي والجهد المبذول ومؤهلاتك وخبراتك.'
            ],
            [
                'level' => 'low',
                'low_threshold' => 0,
                'high_threshold' => 3,
                'interpretation_text_ar' => 'تشير نتيجتك إلى انخفاض مستوى الضغوط الاقتصادية لديك، فأنت لا تعاني من قلة في العائد المادي مقارنة بوظائف أخرى، ولديك تأمين صحي مناسب لك ولعائلتك، ويتناسب العائد المادي مع الجهد المبذول ومؤهلاتك وخبراتك، وتُصرف الرواتب بانتظام وتكافئ الحوافز المادية المجتهدين.'
            ]
        ]
    ]
];
