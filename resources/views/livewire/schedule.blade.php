<div>
    <div style="text-align: center">
        <button wire:click="increment">+</button>
        <h1>{{ $count }}</h1>
    </div>
    <div class="pt-5">
        <h5>COMENTÁRIOS</h5>
        <hr>
        {{-- @foreach ($comments as $comment)
        <div class="" style="width: 22%">
        <div class="row">
            <div class="card bg-light col-md-12 d-flex justify-content-end mb-3" style="max-width: 24rem; height:auto;">
                <div class="card-body">
                    <h5 class="card-title">{{ $comment->user()->first()->name }}</h5>
                    <p class="card-text">{{ $comment->content }}</p>
                    <div class="row"><div class="col-md-12 d-flex justify-content-end">{{ $comment->updated_at->format('H:i') ?? null }}</div></div>
                </div>
            </div>
        </div>
        </div>
        @endforeach --}}
        <hr>
        <form method="post" wire:submit.prevent="create">
            @error('content')
                {{$message}}
            @enderror
            <div class="input-group mb-3">
                @for ($i = 0; $i < $count; $i++)
                    <textarea class="form-control" placeholder="Envie um comentário" name="content" id="content" wire:model="content" cols="5" rows="1"></textarea>
                @endfor
               
                <div class="input-group-append">
                    <button class="btn btn-dark" type="submit">Enviar</button>
                </div>
            </div>
        </form>
        
    </div>
</div>
