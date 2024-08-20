<div class="accordion" id="accordionExample">
    @foreach ($faqData as $faq)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                    aria-controls="collapse{{ $faq->id }}">
                    {{ $faq->title }}
                </button>
            </h2>
            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    {!! $faq->description !!}
                </div>
            </div>
    @endforeach
</div>