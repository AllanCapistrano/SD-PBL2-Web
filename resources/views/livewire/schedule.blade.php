<div class="w-100">
    <h1>{{ $count }}</h1>
    <div style="text-align: center">
        <button class="btn btn-lg btn-dark" wire:click="increment">
            <i class="fas fa-plus"></i>
        </button>
    </div>
    <div class="pt-5">
        <h5>HORÁRIOS</h5>
        {{-- <hr>
        @foreach ($comments as $comment)
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
        @endforeach
        <hr> --}}
        <form method="post" wire:submit.prevent="create">
            @error('content')
                {{$message}}
            @enderror
            <div class="row mt-5">
                @for($i=0; $i < $count; $i++)
                    <div class="input-group mt-3">
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <h3 class="text-white mx-2">Início: </h3>
                            <input style="width: 50%" class="form-control input-timer" type="text" name="schedule{{$i}}" id="" placeholder="Ex: 00h30m05s">
                        </div>


                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <h3 class="text-white mx-2">Fim: </h3>
                            <input style="width: 50%" class="form-control input-timer" type="text" name="schedule{{$i}}" id="" placeholder="Ex: 00h30m05s">
                        </div>


                        <div class="col-4 mt-3 mt-lg-0">
                            <form action="" method="POST">
                                <div class="align-buttons align-items-center">
                                    <div class="form-check text-white mx-2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault{{$i}}" id="rb-ligada{{$i}}"checked>
                                        <label class="form-check-label" for="rb-ligada{{$i}}">
                                            Ligada
                                        </label>
                                    </div>
                                    <div class="form-check text-white mx-1">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault{{$i}}" id="rb-desligada{{$i}}">
                                        <label class="form-check-label" for="rb-desligada{{$i}}">
                                            Desligada
                                        </label>
                                    </div>
                
                                    <button class="btn btn-md btn-secondary mx-3 align-self-center" type="submit">Ativar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                @endfor
            </div>
        </form>
    </div>
</div>