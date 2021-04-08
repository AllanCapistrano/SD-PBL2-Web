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
                <div class="input-group mt-3">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <h3 class="text-white mx-2">Início: </h3>
                        <input style="width: 50%" class="form-control input-timer" type="text" name="begin" id="begin" wire:model="begin" placeholder="Ex: 00h30m05s">
                    </div>


                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <h3 class="text-white mx-2">Fim: </h3>
                        <input style="width: 50%" class="form-control input-timer" type="text" name="end" id="end" wire:model="end" placeholder="Ex: 00h30m05s">
                    </div>


                    <div class="col-4 mt-3 mt-lg-0">
                        <div class="align-buttons align-items-center">
                            <div class="form-check text-white mx-2">
                                <input class="form-check-input" type="radio" name="on" checked wire:model="on" value="true" id="rb-ligada">
                                <label class="form-check-label" for="rb-ligada">
                                    Ligada
                                </label>
                            </div>
                            <div class="form-check text-white mx-1">
                                <input class="form-check-input" type="radio" name="on" wire:model="on" value="false" id="rb-desligada">
                                <label class="form-check-label" for="rb-desligada">
                                    Desligada
                                </label>
                            </div>
        
                            <button class="btn btn-md btn-secondary mx-3 align-self-center" type="submit">Ativar</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <div class="pt-5">
        <div class="row mt-5">
            @foreach ($schedules as $schedule)
            <div class="input-group mt-3">
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <h3 class="text-white mx-2">Início: {{$schedule->begin}}</h3>
                </div>


                <div class="col-4 d-flex justify-content-center align-items-center">
                    <h3 class="text-white mx-2">Fim: {{$schedule->end}}</h3>
                </div>


                <div class="col-4 mt-3 mt-lg-0">
                    <div class="align-buttons align-items-center">
                        <div class="form-check text-white mx-2">
                            <label class="form-check-label" for="">
                                Ligada
                            </label>
                        </div>
                        <div class="form-check text-white mx-1">
                            <label class="form-check-label" for="">
                                Desligada
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="input-group mt-3">
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <h3 class="text-white mx-2">Início: </h3>
                    <input style="width: 50%" class="form-control input-timer" type="text" name="schedule{{$i}}" id="" placeholder="Ex: 00h30m05s">
                </div>


                <div class="col-4 d-flex justify-content-center align-items-center">
                    <h3 class="text-white mx-2">Fim: </h3>
                    <input style="width: 50%" class="form-control input-timer" type="text" name="schedule{{$i}}" id="" placeholder="Ex: 00h30m05s">
                </div>


                <div class="col-4 mt-3 mt-lg-0">
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
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>