<?php

$defaultOptions = [
    ['label_ar' => 'نعم', 'score_value' => 2, 'order_index' => 0],
    ['label_ar' => 'إلى حد ما', 'score_value' => 1, 'order_index' => 1],
    ['label_ar' => 'لا', 'score_value' => 0, 'order_index' => 2],
];

return [
    [
        'name_ar' => 'النمط البصري',
        'max_score' => 20,
        'order_index' => 0,
        'questions' => [
            ['text_ar' => 'أتذكر المعلومات بشكل أفضل عندما أراها مكتوبة أو مصورة.', 'order_index' => 0, 'options' => $defaultOptions],
            ['text_ar' => 'أفضل استخدام الرسوم البيانية والمخططات أثناء التعلم.', 'order_index' => 1, 'options' => $defaultOptions],
            ['text_ar' => 'أركز على مظهر الأشياء وتفاصيلها البصرية.', 'order_index' => 2, 'options' => $defaultOptions],
            ['text_ar' => 'أستطيع تذكر الوجوه أكثر من الأسماء.', 'order_index' => 3, 'options' => $defaultOptions],
            ['text_ar' => 'أحب تنظيم المعلومات في جداول أو خرائط ذهنية.', 'order_index' => 4, 'options' => $defaultOptions],
            ['text_ar' => 'أستخدم عبارات مثل "أرى"، "ألاحظ"، "أنظر".', 'order_index' => 5, 'options' => $defaultOptions],
            ['text_ar' => 'أفضل مشاهدة شرح عملي بدلاً من سماعه فقط.', 'order_index' => 6, 'options' => $defaultOptions],
            ['text_ar' => 'أتذكر الأماكن من خلال شكلها وتصميمها.', 'order_index' => 7, 'options' => $defaultOptions],
            ['text_ar' => 'أشعر أن الألوان تساعدني على الفهم والتذكر.', 'order_index' => 8, 'options' => $defaultOptions],
            ['text_ar' => 'أفضل قراءة التعليمات بنفسي قبل تنفيذ المهمة.', 'order_index' => 9, 'options' => $defaultOptions],
        ],
    ],
    [
        'name_ar' => 'النمط السمعي',
        'max_score' => 20,
        'order_index' => 1,
        'questions' => [
            ['text_ar' => 'أتعلم بشكل أفضل عندما أستمع إلى الشرح.', 'order_index' => 10, 'options' => $defaultOptions],
            ['text_ar' => 'أتذكر ما يقوله الآخرون بسهولة.', 'order_index' => 11, 'options' => $defaultOptions],
            ['text_ar' => 'أفضل المناقشة والحوار لفهم الأفكار.', 'order_index' => 12, 'options' => $defaultOptions],
            ['text_ar' => 'أستمتع بالمحاضرات والمواد الصوتية.', 'order_index' => 13, 'options' => $defaultOptions],
            ['text_ar' => 'أكرر المعلومات بصوت مرتفع للمساعدة على حفظها.', 'order_index' => 14, 'options' => $defaultOptions],
            ['text_ar' => 'أنتبه لنبرة الصوت وطريقة الكلام.', 'order_index' => 15, 'options' => $defaultOptions],
            ['text_ar' => 'أتذكر أسماء الأشخاص أكثر من وجوههم.', 'order_index' => 16, 'options' => $defaultOptions],
            ['text_ar' => 'أفضل أن يشرح لي أحد المهمة شفهياً.', 'order_index' => 17, 'options' => $defaultOptions],
            ['text_ar' => 'أستخدم عبارات مثل "أسمع"، "أصغي"، "أقول".', 'order_index' => 18, 'options' => $defaultOptions],
            ['text_ar' => 'تساعدني المناقشات الجماعية على التعلم.', 'order_index' => 19, 'options' => $defaultOptions],
        ],
    ],
    [
        'name_ar' => 'النمط الحسي',
        'max_score' => 20,
        'order_index' => 2,
        'questions' => [
            ['text_ar' => 'أتعلم بشكل أفضل من خلال التجربة العملية.', 'order_index' => 20, 'options' => $defaultOptions],
            ['text_ar' => 'أحب لمس الأشياء وتجريبها بنفسي.', 'order_index' => 21, 'options' => $defaultOptions],
            ['text_ar' => 'أتحرك كثيراً أثناء التفكير أو التعلم.', 'order_index' => 22, 'options' => $defaultOptions],
            ['text_ar' => 'أتذكر ما قمت به أكثر مما رأيته أو سمعته.', 'order_index' => 23, 'options' => $defaultOptions],
            ['text_ar' => 'أفضل الأنشطة التطبيقية على المحاضرات النظرية.', 'order_index' => 24, 'options' => $defaultOptions],
            ['text_ar' => 'أستخدم عبارات مثل "أشعر"، "ألمس"، "أجرب".', 'order_index' => 25, 'options' => $defaultOptions],
            ['text_ar' => 'أحتاج إلى ممارسة المهارة حتى أتقنها.', 'order_index' => 26, 'options' => $defaultOptions],
            ['text_ar' => 'أشعر بالملل عند الجلوس لفترات طويلة دون نشاط.', 'order_index' => 27, 'options' => $defaultOptions],
            ['text_ar' => 'أتعلم بسرعة عندما أشارك فعلياً في المهمة.', 'order_index' => 28, 'options' => $defaultOptions],
            ['text_ar' => 'تساعدني النماذج والأدوات العملية على الفهم.', 'order_index' => 29, 'options' => $defaultOptions],
        ],
    ],
];
