@extends('layout')
@section('doc', 'Add')
@section('content')

    <h3 class="text-center">
        เพิ่มข้อมูล
    </h3>
    <div class="container py-4 ">
        <form method="POST" action="/insertInfo" id="addinfo" enctype="multipart/form-data">
            @csrf
            <div class="row ms-auto justify-content-center">
                <div class="col-md-9">
                    <h5 class="container">
                        ข้อมูลลูกค้า
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                            <label for="CustomerName" class="form-label">ชื่อและนามสกุล</label>
                            <input type="text" class="form-control" name="CustomerName" value="{{ old('CustomerName') }}">
                            @error('CustomerName')
                                <div class="my-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="NationalID" class="form-label">หมายเลขบัตรประชาชน (13 หลัก) </label>
                            <input type="text" class="form-control" name="NationalID" value="{{ old('NationalID') }}">
                            @error('NationalID')
                                <div class="my-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="PhoneNumber" class="form-label">เบอร์โทรศัพท์ (10 หลัก)</label>
                            <input type="text" class="form-control" name="PhoneNumber" value="{{ old('PhoneNumber') }}">
                            @error('PhoneNumber')
                                <div class="my-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <label for="Address" class="form-label">ที่อยู่จัดส่ง</label>
                            <input type="text" class="form-control" name="Address" value="{{ old('Address') }}">
                            @error('Address')
                                <div class="my-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row ms-auto form-group justify-content-center">
                    <div class="col-md-9">
                        <hr>
                        <h5 class="container">
                            ข้อมูลรถ
                        </h5>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="CarNumber" class="form-label">เลขทะเบียน</label>
                                <input type="text" class="form-control" name="CarNumber" value="{{ old('CarNumber') }}">
                                @error('CarNumber')
                                    <div class="my-1">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="CarCity" class="form-label">จังหวัด</label>
                                <select name="CarCity" class="form-select">
                                    <option value="">เลือก...</option>
                                    @foreach ($prov as $item)
                                        <option value="{{ $item->name }}"
                                            {{ old('CarCity') == $item->name ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('CarCity')
                                    <div class="my-1">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="RegistrationDate" class="form-label">วันที่จดทะเบียน</label>
                                <input type="text" class="form-control datepicker" name="RegistrationDate"
                                    value="{{ old('RegistrationDate') }}" readonly>
                                @error('RegistrationDate')
                                    <div class="my-1">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="TaxHistoryDate" class="form-label">วันที่ต่อภาษีครั้งล่าสุด</label>
                                <input type="text" class="form-control datepicker" name="TaxHistoryDate"
                                    value="{{ old('TaxHistoryDate') }}" readonly>
                                @error('TaxHistoryDate')
                                    <div class="my-1">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="InsHistoryDate" class="form-label">วันที่ต่อ พ.ร.บ. ครั้งล่าสุด</label>
                                <input type="text" class="form-control datepicker" name="InsHistoryDate"
                                    value="{{ old('InsHistoryDate') }}" readonly>
                                @error('InsHistoryDate')
                                    <div class="my-1">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="InsuranceType" class="form-label">ประเภท พ.ร.บ.</label>
                                <select name="InsuranceType" class="form-select">
                                    <option value="">เลือก...</option>
                                    @foreach ($sett['type'] as $item)
                                        <option value="{{ $item->name }}"
                                            {{ old('InsuranceType') == $item->name ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('InsuranceType')
                                    <div class="my-1">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="TaxType" class="form-label">ประเภทภาษี</label>
                                <select name="TaxType" class="form-select">
                                    <option value="">เลือก...</option>
                                    @foreach ($tax as $item)
                                        <option value="{{ $item->name }}"
                                            {{ old('TaxType') == $item->name ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('TaxType')
                                    <div class="my-1">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="CarCC" class="form-label">ขนาดกำลัง (CC)</label>
                                <input type="text" class="form-control" name="CarCC" value="{{ old('CarCC') }}">
                                @error('CarCC')
                                    <div class="my-1">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="CarWeight" class="form-label">น้ำหนักรวม (ก.ก.)</label>
                                <input type="text" class="form-control" name="CarWeight"
                                    value="{{ old('CarWeight') }}">
                                @error('CarWeight')
                                    <div class="my-1">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="SelectOption" class="form-label">การรับเอกสาร</label>
                                <select name="SelectOption" class="form-select">
                                    <option value="">เลือก...</option>
                                    <option value="มารับเอง" {{ old('SelectOption') == 'มารับเอง' ? 'selected' : '' }}>
                                        มารับเอง</option>
                                    <option value="จัดส่งตามที่อยู่"
                                        {{ old('SelectOption') == 'จัดส่งตามที่อยู่' ? 'selected' : '' }}>จัดส่งตามที่อยู่
                                    </option>
                                </select>
                                @error('SelectOption')
                                    <div class="my-1">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="singleFile" class="form-label">สำเนาเล่มทะเบียน</label>
                                <input type="file" class="form-control" name="singleFile">
                            </div>
                        </div>

                        <div class="container col-2 mx-auto">
                            <a href="javascript:history.back()" class="btn my-3" style="background-color:#9fdffa">
                                กลับ</a>
                            <input type="submit" value="บันทึก" class="btn my-3" style="background-color:#A4F02A">
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            

            // ตรวจสอบวันที่ต่อภาษีและวันที่ต่อ พ.ร.บ.
            document.getElementById('addinfo').addEventListener('submit', function(event) {
                var registrationDate = new Date(document.querySelector('[name="RegistrationDate"]').value);
                var taxDate = new Date(document.querySelector('[name="TaxHistoryDate"]').value);
                var insDate = new Date(document.querySelector('[name="InsHistoryDate"]').value);

                // ตรวจสอบว่าทั้งสองวันที่ต้องมากกว่าวันที่จดทะเบียน
                if (taxDate <= registrationDate && insDate <= registrationDate) {
                    event.preventDefault(); // หยุดการส่งฟอร์ม
                    alert("วันที่ต่อภาษี และวันที่ต่อ พ.ร.บ. ต้องเป็นหลังวันที่จดทะเบียน");
                }
                else if (taxDate <= registrationDate) {
                    event.preventDefault(); // หยุดการส่งฟอร์ม
                    alert("วันที่ต่อภาษีต้องเป็นหลังวันที่จดทะเบียน");
                }
                else if (insDate <= registrationDate) {
                    event.preventDefault(); // หยุดการส่งฟอร์ม
                    alert("วันที่ต่อ พ.ร.บ. ต้องเป็นหลังวันที่จดทะเบียน");
                }

            });
            
        });
    </script>

@endsection
