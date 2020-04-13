@if ($faqs->count())
    @foreach($faqs as $faq)

        <div class="card card-faq">
            <div class="card-header">
                <h5 class="mb-0">
                    <button class="btn btn-link arrow collapsed" data-toggle="collapse" data-target="#collapse-{{ $faq->id }}" aria-expanded="false">{{ $faq->question }}</button>
                </h5>
            </div>
            <div class="collapse" id="collapse-{{ $faq->id }}" data-parent="#accordion">
                <div class="card-body">
                    {{ $faq->answer }}
                </div>
            </div>
        </div>

    @endforeach
@endif
