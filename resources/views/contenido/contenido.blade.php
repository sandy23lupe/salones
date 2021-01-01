@extends('principal')
@section('contenido')

{{-- pruebas vue --}}
   {{-- <tipos></tipos>  --}}
   {{-- <empleados></empleados> --}}
   {{-- <clientes></clientes> --}}


<template v-if="menu==1">
    <tipos></tipos> 
</template>

<template v-if="menu==2">
    <empleados></empleados>
</template>

<template v-if="menu==3">
    <clientes></clientes>
</template> 





  
 @endsection