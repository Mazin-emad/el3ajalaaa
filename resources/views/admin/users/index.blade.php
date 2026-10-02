@extends('layouts.admin')
@section('title', 'المستخدمين والنتائج')
@section('page-title', 'إدارة المستخدمين وجلسات الاختبار')

@section('content')
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4">
        <!-- Search & Info -->
        <div class="row g-3 justify-content-between align-items-center">
            <div class="col-md-6">
                <form method="GET" action="{{ route('admin.users.index') }}" class="d-flex gap-2">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="ابحث بالاسم أو البريد أو الجوال أو الهوية..." value="{{ $search }}">
                        @if($search)
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary d-flex align-items-center"><i class="bi bi-x-lg"></i></a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary px-4">بحث</button>
                </form>
            </div>
            <div class="col-md-auto">
                <span class="text-muted small">إجمالي المستخدمين: <strong>{{ $users->total() }}</strong></span>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الجوال</th>
                    <th>رقم الهوية</th>
                    <th>نوع الحساب</th>
                    <th class="text-center">الاختبارات المؤداة</th>
                    <th class="text-center">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $index }}</td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $user->name }}</div>
                        </td>
                        <td class="text-muted small">{{ $user->email }}</td>
                        <td class="text-muted small">{{ $user->phone ?? '—' }}</td>
                        <td class="text-muted small">{{ $user->national_id ?? '—' }}</td>
                        <td>
                            @if($user->isAdmin())
                                <span class="badge bg-danger-subtle text-danger px-2.5 py-1.5 rounded-pill small">مدير النظام</span>
                            @else
                                <span class="badge bg-primary-subtle text-primary px-2.5 py-1.5 rounded-pill small">مستخدم</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge bg-secondary rounded-pill px-3 py-1 fw-medium">
                                {{ $user->completed_exams_count }}
                            </span>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-outline-primary px-3 rounded-pill btn-view-results" data-user-id="{{ $user->id }}">
                                <i class="bi bi-eye me-1"></i> عرض النتائج
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-people fs-1 d-block mb-3 text-secondary"></i>
                            لا يوجد مستخدمين يطابقون خيارات البحث.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($users->hasPages())
        <div class="card-footer bg-transparent border-0 py-3">
            {{ $users->appends(['search' => $search])->links() }}
        </div>
    @endif
</div>

<!-- User Results Modal -->
<div class="modal fade" id="resultsModal" tabindex="-1" aria-labelledby="resultsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title fw-bold" id="resultsModalLabel">
                    <i class="bi bi-mortarboard me-2"></i> سجل اختبارات المستخدم
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- User Details Card -->
                <div class="bg-light p-3 rounded-3 mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fw-bold text-dark mb-1" id="modal-user-name">...</h6>
                        <span class="text-muted small" id="modal-user-email">...</span>
                    </div>
                    <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-3" id="modal-results-count">0 اختبارات مؤداة</span>
                </div>

                <!-- Results Table -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="results-table">
                        <thead class="table-light">
                            <tr>
                                <th>المقياس / الاختبار</th>
                                <th class="text-center">الدرجة المحققة</th>
                                <th class="text-center">المستوى المستحق</th>
                                <th class="text-center">تاريخ الإكمال</th>
                                <th class="text-center">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody id="modal-results-body">
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <div class="spinner-border spinner-border-sm text-primary me-2" role="status"></div>
                                    جاري تحميل سجل النتائج...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light py-3">
                <button type="button" class="btn btn-secondary px-4 rounded-pill" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    const resultsModal = new bootstrap.Modal(document.getElementById('resultsModal'));

    $('.btn-view-results').on('click', function() {
        const userId = $(this).data('user-id');
        
        // Reset modal to loading state
        $('#modal-user-name').text('...');
        $('#modal-user-email').text('...');
        $('#modal-results-count').text('0 اختبارات مؤداة');
        $('#modal-results-body').html(`
            <tr>
                <td colspan="5" class="text-center py-4 text-muted">
                    <div class="spinner-border spinner-border-sm text-primary me-2" role="status"></div>
                    جاري تحميل سجل النتائج...
                </td>
            </tr>
        `);

        // Show modal immediately
        resultsModal.show();

        // Fetch data
        $.ajax({
            url: `{{ url('/admin/users') }}/${userId}/results`,
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    $('#modal-user-name').text(response.user.name);
                    $('#modal-user-email').text(response.user.email);
                    $('#modal-results-count').text(`${response.results.length} اختبارات مؤداة`);

                    let rowsHtml = '';
                    if (response.results.length === 0) {
                        rowsHtml = `
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-info-circle fs-2 d-block mb-2 text-secondary"></i>
                                    لا يوجد جلسات اختبار مكتملة لهذا المستخدم حتى الآن.
                                </td>
                            </tr>
                        `;
                    } else {
                        response.results.forEach(res => {
                            let badgeClass = 'bg-secondary';
                            if (res.level_raw === 'high') badgeClass = 'bg-success';
                            else if (res.level_raw === 'medium') badgeClass = 'bg-warning text-dark';
                            else if (res.level_raw === 'low') badgeClass = 'bg-danger';

                            // Construct view result URL dynamically
                            const resultUrl = `{{ url('/exam') }}/${res.id}/result`;

                            rowsHtml += `
                                <tr>
                                    <td>
                                        <div class="fw-semibold text-dark">${res.assessment_title}</div>
                                    </td>
                                    <td class="text-center fw-bold text-primary">${res.total_score} / ${res.max_possible_score}</td>
                                    <td class="text-center">
                                        <span class="badge ${badgeClass} px-2.5 py-1.5 rounded-3 fw-medium">${res.level}</span>
                                    </td>
                                    <td class="text-center text-muted small">${res.completed_at}</td>
                                    <td class="text-center">
                                        <a href="${resultUrl}" target="_blank" class="btn btn-sm btn-outline-secondary px-3 rounded-pill">
                                            <i class="bi bi-box-arrow-up-right me-1"></i> التقرير
                                        </a>
                                    </td>
                                </tr>
                            `;
                        });
                    }

                    $('#modal-results-body').html(rowsHtml);
                } else {
                    $('#modal-results-body').html(`
                        <tr>
                            <td colspan="5" class="text-center py-4 text-danger">
                                <i class="bi bi-exclamation-triangle me-2"></i> حدث خطأ أثناء تحميل البيانات.
                            </td>
                        </tr>
                    `);
                }
            },
            error: function() {
                $('#modal-results-body').html(`
                    <tr>
                        <td colspan="5" class="text-center py-4 text-danger">
                            <i class="bi bi-exclamation-triangle me-2"></i> فشل الاتصال بالخادم.
                        </td>
                    </tr>
                `);
            }
        });
    });
});
</script>
@endpush
