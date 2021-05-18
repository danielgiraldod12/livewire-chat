Livewire.on('alertError', function(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No existe una sala con ese codigo!',
    })
})

Livewire.on('showCreateForm', function(){
    $('#sectionJoin').addClass('hidden');
    $('#sectionCreateRoom').removeClass('hidden');
})

Livewire.on('showJoinForm', function(){
    $('#sectionCreateRoom').addClass('hidden');
    $('#sectionJoin').removeClass('hidden');
})

Livewire.on('alertLogin', function(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debes unirte primero a la sala!',
    })
})

Livewire.on('alertEmpty', function(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debes llenar todos los campos!',
    })
})

Livewire.on('alertChat', function(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debes escribir algo!',
    })
})

Livewire.on('alertLenght', function(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'El codigo debe tener 4 numeros!',
    })
})

Livewire.on('alertNum', function(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'El codigo solo puede tener numeros!',
    })
})
