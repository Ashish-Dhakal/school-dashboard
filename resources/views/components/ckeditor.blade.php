@push('css')
<style>
    .ck-editor__editable {
        min-height: 200px;
    }
</style>
@endpush

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    document.querySelectorAll('.editor').forEach(function(editorElement) {
        ClassicEditor
            .create(editorElement, {
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'outdent',
                        'indent',
                        '|',
                        'imageUpload',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'undo',
                        'redo',
                        '|',
                        'alignment',
                        'fontColor',
                        'fontBackgroundColor'
                    ]
                },
                language: 'en',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                }
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endpush 