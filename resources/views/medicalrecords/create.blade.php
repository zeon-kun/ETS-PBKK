<x-app-layout>
    <div class="w-full bg-gray-400 min-h-screen py-10">
        <div class="w-[50%] mx-auto  bg-white rounded-lg px-10 py-5">
            <form class="w-full" action="/barang/add" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="flex flex-col justify-center items-start gap-y-3">
                    {{-- @foreach ($patients as $patient)
                        <option value="{{$patient->id}}">{{$patient->name}}</option>
                    @endforeach --}}
                    <label for="patient_name" class="font-[700] text-xl">Patient</label>
                    <select name="patient_name" class="w-[100%] outline-none">
                        @foreach ($patients as $patient)
                        <option value="{{$patient->id}}">{{$patient->nama}}</option>
                        @endforeach
                    </select>

                    <label for="doctor_name" class="font-[700] text-xl">Doctor</label>
                    <select name="doctor_name" class="w-[100%] outline-none">
                        @foreach ($doctors as $doctor)
                        <option value="{{$doctor->id}}">{{$doctor->nama}}</option>
                        @endforeach
                    </select>
                    <x-bladewind.input type="text" name="condition" label="Condition" required="true" />
                    <x-bladewind.input type="number" name="temperature" label="Temperature" required="true" />
                    <x-bladewind.filepicker name="image" placeholder="Upload an Image" label="image" required="true"/>
                    <x-bladewind.button has_spinner="true" onclick="unhide('.save-user .bw-spinner')" can_submit="true">
                        Submit
                    </x-bladewind.button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>