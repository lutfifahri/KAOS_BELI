<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div id="preview-image"></div>
        </div>
    </div>
</section>

<style>
    .wrapper-amm-hover-title-merge-images {
        font-size: 20px !important;
        font-weight: bold !important;
    }

    .wrapper_hover_title_meme_amm {
        font-size: 20px !important;
        font-weight: bold !important;
    }
</style>

<script>
    $(function() {
        previewImage();
    });

    function previewImage() {
        $('#preview-image').imageMaker({
            text_boxes_count: 0,
            merge_image_thumbnail_width: 'auto',
            merge_image_thumbnail_height: '135',
            template_thumbnail_width: 'auto',
            template_thumbnail_height: '135',
            downloadGeneratedImage: false,
            merge_images: [
                {
                    url: '{{ $sticker->image() }}',
                    title: 'Stiker :'
                },
            ],
            templates: [
                {
                    url: '{{ $product->category->image() }}',
                    title: 'Template {{ $product->category->name }} :'
                },
            ],
            onLoad: function(info) {
                styleTemplateMaker();
            },
            onGenerate: function(data, formData) {
                $.ajax({
                    url: '{{ url()->full() }}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        product_id: '{{ $request->product_id }}',
                        sticker_id: '{{ $request->sticker_id }}',
                        qty: '{{ $request->qty }}',
                        image: data
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.replace('{{ url("/") }}');
                    }
                });
            }
        });
    }

    function styleTemplateMaker() {
        $('#preview-image .wrapper-memes-main button').addClass('button');
        $('#preview-image .wrapper-memes-preview-operations').addClass('text-start ms-5');
        $('#preview-image #amm-brushes').removeClass('btn-default');
        $('#preview-image #amm-merge-image-trigger').addClass('d-none');
        $('#preview-image #amm-upload-image-meme-responsive').addClass('d-none');
        $('#preview-image .advanced-options-operations-form').addClass('d-none');
        $('#preview-image .form-generat-meme').addClass('text-start ms-5');
        $('#preview-image .generate_meme').removeClass('btn-default');
        $('#preview-image .generate_meme').addClass('button');
        $('#preview-image .form-generat-meme button').removeClass('btn-default btn-danger');
        $('#preview-image .advanced-options-operations-form button').removeClass('btn-success');
        $('#preview-image .wrapper-select-merge-image-amm').addClass('mb-4');
        $('#preview-image .wrapper-amm-hover-title-merge-images').show();
        $('#preview-image .wrapper-amm-hover-title-merge-images').html('Stiker :');
        $('#preview-image .wrapper_hover_title_meme_amm').addClass('mb-3');
        $('#preview-image .generate_meme').html('Masukan Keranjang Belanja');
        $('#preview-image .generate_meme button').removeClass('btn-primary');
    }
</script>
