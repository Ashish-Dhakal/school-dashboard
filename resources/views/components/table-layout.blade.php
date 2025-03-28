@props(['title', 'createUrl' => null])

<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom py-3">
            <div class="flex-grow-1">
                <h5 class="card-title mb-0 text-primary">{{ $title }}</h5>
            </div>
            @if($createUrl)
                <div class="action-buttons ms-auto">
                    <a href="{{ $createUrl }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        <span class="d-none d-sm-inline-block ms-1">Add New</span>
                    </a>
                </div>
            @endif
        </div>
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>

@once
    @push('css')
    <style>
        .card {
            border: none;
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background: linear-gradient(to right, #f8f9fa, #ffffff);
        }
        
        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
        
        .table td {
            vertical-align: middle;
            padding: 1rem 0.75rem;
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.03);
        }
        
        .btn-primary {
            padding: 0.5rem 1rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .dataTables_wrapper .dataTables_length select {
            min-width: 80px;
            margin: 0 0.5rem;
        }
        
        .dataTables_wrapper .dataTables_filter input {
            min-width: 250px;
            padding: 0.375rem 0.75rem;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.375rem 0.75rem;
            margin-left: 0.25rem;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            color: #6c757d !important;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #007bff !important;
            border-color: #007bff;
            color: #fff !important;
        }
        
        .empty-state {
            padding: 3rem 1rem;
            text-align: center;
        }
        
        .empty-state i {
            font-size: 3rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }
        
        .empty-state h6 {
            color: #6c757d;
            margin-bottom: 1rem;
        }
        
        @media (max-width: 576px) {
            .card-header {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch !important;
            }
            
            .btn-primary {
                width: 100%;
                justify-content: center;
            }
            
            .dataTables_wrapper .dataTables_filter input {
                min-width: 100%;
            }
        }
    </style>
    @endpush
@endonce 