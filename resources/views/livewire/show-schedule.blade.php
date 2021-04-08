<div class="w-100">
    <div class="pt-5">
        <form method="post" wire:submit.prevent="create">
            @if($errors->all())
                <div class="row d-flex justify-content-center">
                    <div class="alert alert-danger w-50" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background-color: #f8d7da; border: none; color: #842029;">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                        {{ $errors->first() }}
                    </div>
                </div>
            @endif
            <div class="row mt-5">
                <div class="input-group mt-3">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <h3 class="text-white mx-2">Início: </h3>
                        <input style="width: 50%" class="form-control input-timer {{ $errors->has('begin') ? 'is-invalid' : '' }}" type="time" step="1" name="begin" id="begin" wire:model="begin" placeholder="Ex: 00h30m05s">
                    </div>


                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <h3 class="text-white mx-2">Fim: </h3>
                        <input style="width: 50%" class="form-control input-timer {{ $errors->has('end') ? 'is-invalid' : '' }}" type="time" step="1" name="end" id="end" wire:model="end" placeholder="Ex: 00h30m05s">
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
    <hr>
    <div class="pt-5">
        <div class="row mt-5">
            @foreach ($schedules as $schedule)
            <hr>
            <div class="input-group">
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <h3 class="text-white mx-2">Início: {{$schedule->begin}}</h3>
                </div>


                <div class="col-4 d-flex justify-content-center align-items-center">
                    <h3 class="text-white mx-2">Fim: {{$schedule->end}}</h3>
                </div>


                <div class="col-4 mt-3 mt-lg-0">
                    <div class="align-buttons align-items-center">
                        @if ($schedule->on == "1")
                            <div class="form-check text-white mx-2">
                                <label class="form-check-label" for="">
                                    Ligada &nbsp;&nbsp;
                                </label>
                            </div>
                        @else
                            <div class="form-check text-white mx-1">
                                <label class="form-check-label" for="">
                                    Desligada
                                </label>
                            </div>
                        @endif
                        <a class="mx-5 navbar-brand trash-icon" onclick="document.getElementById('lamp_form').submit();">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>