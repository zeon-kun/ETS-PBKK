<x-app-layout>

  <div class="w-full bg-gray-200 min-h-screen py-5">
  @if ($message = Session::get('success'))
    <div class="mx-auto w-[50%] bg-green-300 px-5 py-4 rounded-lg flex justify-center items-center">
      <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
    </div>
  @endif

  @if ($message = Session::get('error'))
  <div class="mx-auto w-[50%] bg-red-300 px-5 py-4 rounded-lg flex justify-center items-center">
    <button type="button" class="close" data-dismiss="alert">×</button>	
      <strong>{{ $message }}</strong>
  </div>
@endif
    <div class="w-[80%] bg-white mx-auto min-h-screen rounded-lg p-10">
      <div class="w-full flex justify-end items-center my-5">
        <a href="medicalrecord/add">
            <x-bladewind.button>
                Add Record
            </x-bladewind.button>
        </a>
    </div>
        <div class="w-full bg-gray-200 rounded-lg p-2 gap-5 flex flex-col justify-center items-center">
            <div class="w-full flex  flex-row justify-start items-center gap-x-10 bg-yellow-400 ">
              <div class="basis-1/6">id</div>
              <div class="basis-1/6">image</div>
              <div class="basis-1/6">patient name</div>
              <div class="basis-1/6">doctor name</div>
              <div class="basis-1/6 ">condition</div>
              <div class="basis-1/6 ">temperature</div>
            </div>
            @php
              $i = 1;
            @endphp
            @foreach ($records as $record)
              <div class="w-full flex  flex-row justify-start items-center gap-x-10">
                <div class="basis-1/12 ">{{ $i }}</div>
                <div class="basis-1/4 rounded-full  flex justify-center items-center">
                  @if ($record->image !== null)
                    <img src="storage/images/{{$record->image}}" alt="profile" class="w-[3rem] h-[3rem] object-contain">
                  @endif
                </div>
                <div class="basis-1/4 ">{{ $record->patient_name }}</div>
                <div class="basis-3/4 ">{{ $record->doctor_name }}</div>
                <div class="basis-1/4 ">{{ $record->condition }}</div>
                <div class="basis-1/4 ">{{ $record->temperature }}</div>
                <div class="basis-1/3 flex justify-between items-center">
                  <button class="bg-green-400 w-[8rem] h-[2rem] rounded-lg hover:scale-90 transition-all duration-200">
                    <a class="w-full flex  justify-center items-center" href="/record/detail/{{$record->id}}">Detail</a>
                  </button>
                </div>    
              </div>
              @php
                $i++;
              @endphp
            @endforeach
          </div>
    </div>   
  </div>        
</x-app-layout>