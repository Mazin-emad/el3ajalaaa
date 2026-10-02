@extends('layouts.admin')
@section('title', 'إدارة الأيقونات')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1 fw-bold text-dark"><i class="bi bi-images me-2"></i>إدارة الأيقونات</h4>
            <p class="text-muted small mb-0">قم برفع وإدارة الأيقونات المخصصة للشهادات، البرامج، وخطط التطوير.</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addIconModal">
            <i class="bi bi-cloud-arrow-up me-1"></i> رفع أيقونة جديدة
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm rounded-3">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
    @endif
    
    @if($errors->any())
    <div class="alert alert-danger border-0 shadow-sm rounded-3">
        <ul class="mb-0 ps-3">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row g-4">
        @php
            $cats = [
                'certificates' => ['title' => 'أيقونات الشهادات الاحترافية', 'icon' => 'bi-award', 'color' => 'primary'],
                'programs' => ['title' => 'أيقونات البرامج المقترحة', 'icon' => 'bi-journal-bookmark', 'color' => 'success'],
                'plan_30_days' => ['title' => 'أيقونات خطة 30 يوم', 'icon' => 'bi-calendar-check', 'color' => 'info'],
                'assessments' => ['title' => 'أيقونات المقاييس', 'icon' => 'bi-ui-radios', 'color' => 'warning'],
                'system' => ['title' => 'أيقونات النظام والإحصائيات', 'icon' => 'bi-gear-wide-connected', 'color' => 'secondary']
            ];
        @endphp

        @foreach($cats as $catKey => $catData)
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="mb-0 fw-bold text-{{ $catData['color'] }}">
                        <i class="bi {{ $catData['icon'] }} me-2"></i>{{ $catData['title'] }}
                    </h5>
                </div>
                <div class="card-body bg-light">
                    @if(isset($icons[$catKey]) && $icons[$catKey]->count() > 0)
                        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">
                            @foreach($icons[$catKey] as $icon)
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm rounded-3 text-center position-relative overflow-hidden">
                                    <div class="p-3 d-flex align-items-center justify-content-center" style="height: 100px; background-color: #f8fafc;">
                                        <img src="{{ $icon->icon_url }}" alt="{{ $icon->name }}" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                    </div>
                                    <div class="card-footer bg-white border-top-0 py-2">
                                        <p class="mb-0 small fw-bold text-truncate" title="{{ $icon->name }}">{{ $icon->name }}</p>
                                    </div>
                                    <!-- Delete Button overlay -->
                                    <form action="{{ route('admin.icons.destroy', $icon->id) }}" method="POST" class="position-absolute top-0 end-0 p-1 m-1 bg-white rounded-circle shadow-sm" style="z-index: 10; opacity: 0.9;" onsubmit="return confirm('هل أنت متأكد من حذف هذه الأيقونة؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger p-0 border-0 d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;" title="حذف">
                                            <i class="bi bi-x-circle-fill fs-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="bi bi-inboxes fs-1 mb-2 d-block opacity-50"></i>
                            <p class="mb-0">لا توجد أيقونات مضافة في هذا القسم بعد.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Add Icon Modal -->
<div class="modal fade" id="addIconModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('admin.icons.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-light border-bottom-0">
                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-cloud-arrow-up me-2"></i>رفع أيقونة جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-medium">اسم الأيقونة *</label>
                        <input type="text" name="name" class="form-control" required placeholder="مثال: أيقونة القيادة، شعار PMP...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-medium">التصنيف *</label>
                        <select name="category" class="form-select" required>
                            <option value="">-- اختر التصنيف --</option>
                            <option value="certificates">الشهادات الاحترافية</option>
                            <option value="programs">البرامج المقترحة</option>
                            <option value="plan_30_days">خطة تطوير (30 يوماً)</option>
                            <option value="assessments">المقاييس</option>
                            <option value="system">أيقونات النظام (الإحصائيات)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-medium">ملف الأيقونة (صورة) *</label>
                        <input type="file" name="icon_file" class="form-control" accept="image/png, image/jpeg, image/svg+xml, image/webp" required>
                        <div class="form-text mt-2 text-primary">
                            <i class="bi bi-info-circle me-1"></i> الحجم الأقصى المسموح به هو 500 كيلوبايت. يُفضل استخدام أبعاد مربعة (مثل 128x128 أو 256x256) بصيغة PNG شفافة أو SVG.
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-top-0">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg me-1"></i>حفظ ورفع</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
