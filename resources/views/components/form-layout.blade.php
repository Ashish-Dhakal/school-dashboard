@props(['title', 'action', 'method' => 'POST', 'hasFiles' => false])

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{ $action }}" 
                method="{{ $method === 'GET' ? 'GET' : 'POST' }}" 
                @if($hasFiles) enctype="multipart/form-data" @endif>
                
                @if($method !== 'GET' && $method !== 'POST')
                    @method($method)
                @endif
                
                @if($method !== 'GET')
                    @csrf
                @endif

                <div class="card shadow-sm">
                    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
                        <h5 class="card-title mb-0 text-primary">{{ $title }}</h5>
                        <div class="card-actions">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-arrow-left"></i>
                                <span class="d-none d-sm-inline-block ms-1">Back</span>
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                <span class="d-none d-sm-inline-block ms-1">Save</span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $slot }}
                    </div>
                </div>
            </form>
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
        
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .form-label.required::after {
            content: ' *';
            color: #dc3545;
        }
        
        .form-control {
            padding: 0.5rem 0.75rem;
            border-color: #dee2e6;
        }
        
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        
        .invalid-feedback {
            font-size: 0.875rem;
        }
        
        .btn {
            padding: 0.5rem 1rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .custom-file-input {
            cursor: pointer;
        }
        
        .image-preview {
            max-width: 200px;
            margin-top: 1rem;
        }
        
        .image-preview img {
            width: 100%;
            height: auto;
            border-radius: 0.25rem;
        }
        
        @media (max-width: 576px) {
            .card-header {
                flex-direction: column;
                gap: 1rem;
            }
            
            .card-actions {
                display: flex;
                width: 100%;
                gap: 0.5rem;
            }
            
            .card-actions .btn {
                flex: 1;
                justify-content: center;
            }
        }
    </style>
    @endpush
@endonce 