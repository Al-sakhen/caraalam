@extends('frontend.layout.app')

@section('content')
    <div class=" bg-green-300/60 p-5 pt-12 h-content">
        <div class="container mx-auto grid grid-cols-12">
            {{-- الاسم ورقم الشاصي --}}
            <div class="col-span-12 md:col-span-4">
                <div class="flex flex-col">
                    <span class="mb-2">
                        <h1 class="text-lg font-bold">اسم السيارة</h1>
                        <p>
                            فورد فيوجن 1012
                        </p>
                    </span>

                    <span class="mb-2">
                        <h1 class="text-lg font-bold">رقم الشاصي</h1>
                        <p>
                            3FADP0L35CR327698
                        </p>
                    </span>
                </div>
            </div>

            {{-- تاريخ التقرير --}}
            <div class="col-span-12 md:col-span-4">
                <div class="flex flex-col">
                    <span class="mb-2">
                        <h1 class="text-lg font-bold">تاريخ التقرير</h1>
                        <p>
                            {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
                        </p>
                    </span>
                </div>
            </div>

            {{-- صورة السيارة  --}}
            <div class="col-span-12 md:col-span-4">
                <div class="flex flex-col">
                    <img src="{{ asset('front/images/car 1.png') }}" alt=""
                        class="w-full h-36 object-contain">
                </div>
            </div>
        </div>
    </div>

    {{-- Rating --}}
    <div class="bg-gray-200 flex items-center gap-5 p-5">
        <div class="container mx-auto">
            <h4>
                <span class="text-lg font-bold">تقييم المركبة</span>
            </h4>
            <livewire:front.components.rating-component />
        </div>
    </div>
@endsection
