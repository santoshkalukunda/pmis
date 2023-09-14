<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | {{ $project->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('nepali-datepicker/css/nepali.datepicker.v4.0.1.min.css') }}">
    <link href="{{ asset('font/Kalimati.ttf') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        @font-face {
            font-family: 'Kalimati';
            font-display: fallback;
            src: url("{{ asset('font/Kalimati.ttf') }}") format('truetype');
        }

        .font-kalimati {
            font-family: 'Kalimati';
        }

        .text-right {
            text-align: right;
        }

        .project-photo {
            width: 340px;
            max-height: 300px;
            object-fit: fill;
            overflow: hidden;
            margin: 4px;
        }
    </style>
    @stack('styles')
</head>

<body class="m-5">
    <div class="container-fluid">
        <div class="row text-center ">
            <div class="col-sm-12">
                <img src="{{ asset('img/logo.png') }}" alt="{{ env('APP_NAME') }}" class="my-1" height="100">
                <h6>प्रदेश सरकार</h6>
                <h3>सुदूरपश्चिम प्रदेश</h3>
                <h4>{{ Auth::user()->office->name }}</h4>
                <u>आयोजना प्रतिवेदन</u>
            </div>
        </div>
        <hr>
        <div class="row gy-2">
            <div class="col-12 text-center">
                <h4 class="fw-bold"> <u>{{ $project->name }}</u></h4>
            </div>
            <div class="col-4">
                <div class=""><b>आयोजनाको किसिम :</b> {{ $project->projectType->name ?? '' }}</div>
            </div>
            <div class="col-4">
                <div class="">
                    <b>आयोजना स्थान :</b> {{ $project->municipality }}-{{ $project->ward_no }},
                    {{ $project->district }}
                </div>
            </div>
            <div class="col-4">
                <div class="fn-bold"><b>आ. ब.:</b> {{ $project->fiscalYear->fiscal_year }}</div>
            </div>
            @if ($project->project_time_type)
                <div class="col-4"> <span class="fw-bold">आयोजनाको प्रकार : </span> <span
                        class="font-kalimati">{{ $project->project_time_type == 1 ? 'बहुबर्षीय' : 'एकवर्षीय' }}</span>
                </div>
            @endif
            @if ($project->time_period)
                <div class="col-4"> <span class="fw-bold">प्रोजेक्ट समाप्ति समय : </span> <span
                        class="font-kalimati">{{ $project->time_period }} महिना</span>
                </div>
            @endif
            @if ($project->population_to_be_benefited)
                <div class="col-4"> <span class="fw-bold">लाभाम्वित हुने जनसंख्या: </span><span
                        class="font-kalimati">{{ $project->population_to_be_benefited }}</span>
                </div>
            @endif
            <div class="col-4">
                <div class="font-kalimati"><b>बजेट उपशीर्षक न. :</b> {{ $project->budget_subtitle ?? '' }}</div>
            </div>

            @if ($project->approval_budget)
                <div class="col-4"> <span class="fw-bold">स्वीकृति बजेट : </span> <span
                        class="font-kalimati">रु.{{ $project->approval_budget }}/-</span>
                </div>
            @endif
            {{-- @if ($project->budget()->sum('budget') > 0)
                <div class="col-4"> <span class="fw-bold">विनियोजित बजेट : </span> <span
                        class="font-kalimati">रु.{{ $project->budget()->sum('budget') }}/-</span>
                </div>
            @endif --}}

            @if ($project->agreement_date)
                <div class="col-4"> <span class="fw-bold">सम्झौता रकम: </span><span class="font-kalimati">
                        {{ $project->tender_amount }}</span>
                </div>

                <div class="col-4"> <span class="fw-bold">सम्झौता मिति : </span><span class="font-kalimati"
                        id="agreement_date_bs"></span>
                </div>
            @else
                <div class="col-4">
                    <span class="fw-bold">
                        सम्झौता भयको छैन
                    </span>
                </div>
            @endif
            @if ($project->project_start_date)
                <div class="col-4"> <span class="fw-bold">आयोजना सुरु मिति: </span><span class="font-kalimati"
                        id="project_start_date_bs"></span>
                </div>
            @else
                <div class="col-4">
                    <span class="fw-bold">आयोजना सुरु भयको छैन </span>
                </div>
            @endif
            @if ($project->contract_number)
                <div class="col-4"> <span class="fw-bold">ठेक्का नं. : </span> <span
                        class="font-kalimati">{{ $project->contract_number }}</span>
                </div>
            @endif
            @if ($project->contractor_name)
                <div class="col-4"> <span class="fw-bold">ठेकेदारको नाम : </span> <span
                        class="font-kalimati">{{ $project->contractor_name }}</span>
                </div>
            @endif
            @if ($project->contractor_address)
                <div class="col-4"> <span class="fw-bold">ठेकेदारको ठेगाना : </span> <span
                        class="font-kalimati">{{ $project->contractor_address }}</span>
                </div>
            @endif
            @if ($project->contractor_contact)
                <div class="col-4"> <span class="fw-bold">ठेकेदारको सम्पर्क नं. : </span> <span
                        class="font-kalimati">{{ $project->contractor_contact }}</span>
                </div>
            @endif

            {{-- @if ($project->expenditure()->sum('expenditure') > 0)
                <div class="col-4"> <span class="fw-bold">हाल सम्मको कुल खर्च : </span> <span
                        class="font-kalimati">रु.{{ $project->expenditure()->sum('expenditure') }}/-</span>
                </div>
            @endif --}}

            @if ($project->status)
                <div class="col-4"> <span class="fw-bold">आयोजनाको स्थिति:
                    </span><span>{{ $project->status == 1 ? 'सम्पन्न भइसकेको छ' : 'काम भइरहेको छ' }}</span>
                </div>
            @endif

            @if ($project->status == 1)
                <div class="col-4"> <span class="fw-bold">आयोजना समाप्त मिति: </span><span class="font-kalimati"
                        id="project_completion_date_bs"></span>
            @endif
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <span class="fw-bold">विनियोजित बजेट</span>
            </div>
            <div class="col-md-12 bg-white">
                <div>
                    <table class="table table-striped text-sm">
                        <thead style="white-space: nowrap;">
                            <th>आ.ब.</th>
                            <th>मिति</th>
                            <th>बजेट स्रोत</th>
                            <th>बजेट उपशीर्षक न.</th>
                            <th class="text-right font-kalimati">विनियोजित बजेट</th>

                        </thead>
                        <tbody>
                            @php
                                $totalAllocatedbudget = 0;
                            @endphp
                            @forelse ($project->budget as $budget)
                                @php
                                    $totalAllocatedbudget = $totalAllocatedbudget + $budget->budget;
                                @endphp
                                <tr>
                                    <td>{{ $budget->fiscalYear->fiscal_year }}</td>
                                    <td class="font-kalimati"><span id="date-{{ $budget->id }}"></span></td>
                                    <td class="font-kalimati">{{ $budget->budgetSource->name }}</td>
                                    <td class="font-kalimati">{{ $budget->budget_subtitle }}</td>
                                    <td class="text-right font-kalimati font-kalimati">{{ $budget->budget }}</td>

                                </tr>
                                @push('scripts')
                                    <script>
                                        $(document).ready(function() {
                                            date1 = NepaliFunctions.AD2BS("{{ $budget->date }}");
                                            document.getElementById("date-{{ $budget->id }}").innerHTML = date1;
                                        });
                                    </script>
                                @endpush
                            @empty
                                <tr>
                                    <td colspan="20">
                                        <div class="text-red text-center">
                                            कुनै पनि डाटा उपलब्ध छैन
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            <tr>
                                <td class="text-right font-kalimati" colspan="4">
                                    जम्मा
                                </td>
                                <td class="text-right font-kalimati font-kalimati">
                                    {{ $totalAllocatedbudget }}
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <span class="fw-bold">सूचक</span>
            </div>
            <div class="table-responsive">
                <table class="table table-striped text-sm">
                    <thead style="white-space: nowrap;">
                        <th>आ.ब.</th>
                        <th>विवरण</th>
                        <th>एकाई</th>
                        <th class="text-right font-kalimati">दर</th>
                        <th class="text-right font-kalimati">परिमाण</th>
                        <th class="text-right font-kalimati">लागत</th>
                        <th class="text-right font-kalimati">भार</th>

                        <th class="text-right font-kalimati">बार्षिक परिमाण लक्ष्य</th>
                        <th class="text-right font-kalimati">बार्षिक लागत लक्ष्य</th>
                        <th class="text-right font-kalimati">बार्षिक भार लक्ष्य</th>

                        <th class="text-right font-kalimati">प्रथम चौमासिक परिमाण लक्ष्य</th>
                        <th class="text-right font-kalimati">प्रथम चौमासिक लागत लक्ष्य</th>
                        <th class="text-right font-kalimati">प्रथम चौमासिक भार लक्ष्य</th>

                        <th class="text-right font-kalimati">दोस्रो चौमासिक परिमाण लक्ष्य</th>
                        <th class="text-right font-kalimati">दोस्रो चौमासिक लागत लक्ष्य</th>
                        <th class="text-right font-kalimati">दोस्रो चौमासिक भार लक्ष्य</th>

                        <th class="text-right font-kalimati">तेस्रो चौमासिक परिमाण लक्ष्य</th>
                        <th class="text-right font-kalimati">तेस्रो चौमासिक लागत लक्ष्य</th>
                        <th class="text-right font-kalimati">तेस्रो चौमासिक भार लक्ष्य</th>

                        <th class="text-right font-kalimati">चौथों चौमासिक परिमाण लक्ष्य</th>
                        <th class="text-right font-kalimati">चौथों चौमासिक लागत लक्ष्य</th>
                        <th class="text-right font-kalimati">चौथों चौमासिक भार लक्ष्य</th>

                        <th>Action</th>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                            $bhar = 0;
                            $totalBhar = 0;
                            
                            $yearlyCost = 0;
                            $yearlyTotalCost = 0;
                            $yearlyBhar = 0;
                            $yearlyTotalBhar = 0;
                            
                            $firstQuarterlyCost = 0;
                            $firstQuarterlyTotalCost = 0;
                            $firstQuarterlyBhar = 0;
                            $firstQuarterlyTotalBhar = 0;
                            
                            $secondQuarterlyCost = 0;
                            $secondQuarterlyTotalCost = 0;
                            $secondQuarterlyBhar = 0;
                            $secondQuarterlyTotalBhar = 0;
                            
                            $thirdQuarterlyCost = 0;
                            $thirdQuarterlyTotalCost = 0;
                            $thirdQuarterlyBhar = 0;
                            $thirdQuarterlyTotalBhar = 0;
                            
                            $fourthQuarterlyCost = 0;
                            $fourthQuarterlyTotalCost = 0;
                            $fourthQuarterlyBhar = 0;
                            $fourthQuarterlyTotalBhar = 0;
                            
                        @endphp
                        @foreach ($project->estimate as $estimate)
                            @php
                                $cost = $estimate->quantity * $estimate->rate;
                                $total += $cost;
                            @endphp
                        @endforeach
                        @forelse ($project->estimate as $estimate)
                            @php
                                $cost = $estimate->quantity * $estimate->rate;
                                $bhar = ($cost * 100) / $total;
                                $totalBhar += $bhar;
                                
                                if ($estimate->yearly_target_quantity) {
                                    $yearlyCost = $estimate->yearly_target_quantity * $estimate->rate;
                                    $yearlyTotalCost += $yearlyCost;
                                    $yearlyBhar = ($yearlyCost * 100) / $total;
                                    $yearlyTotalBhar += $yearlyBhar;
                                }
                                
                                if ($estimate->first_quarterly_target_quantity) {
                                    $firstQuarterlyCost = $estimate->first_quarterly_target_quantity * $estimate->rate;
                                    $firstQuarterlyTotalCost += $firstQuarterlyCost;
                                    $firstQuarterlyBhar = ($firstQuarterlyCost * 100) / $total;
                                    $firstQuarterlyTotalBhar += $firstQuarterlyBhar;
                                }
                                
                                if ($estimate->second_quarterly_target_quantity) {
                                    $secondQuarterlyCost = $estimate->second_quarterly_target_quantity * $estimate->rate;
                                    $secondQuarterlyTotalCost += $secondQuarterlyCost;
                                    $secondQuarterlyBhar = ($secondQuarterlyCost * 100) / $total;
                                    $secondQuarterlyTotalBhar += $secondQuarterlyBhar;
                                }
                                
                                if ($estimate->third_quarterly_target_quantity) {
                                    $thirdQuarterlyCost = $estimate->third_quarterly_target_quantity * $estimate->rate;
                                    $thirdQuarterlyTotalCost += $thirdQuarterlyCost;
                                    $thirdQuarterlyBhar = ($thirdQuarterlyCost * 100) / $total;
                                    $thirdQuarterlyTotalBhar += $thirdQuarterlyBhar;
                                }
                                
                                if ($estimate->fourth_quarterly_target_quantity) {
                                    $fourthQuarterlyCost = $estimate->fourth_quarterly_target_quantity * $estimate->rate;
                                    $fourthQuarterlyTotalCost += $fourthQuarterlyCost;
                                    $fourthQuarterlyBhar = ($fourthQuarterlyCost * 100) / $total;
                                    $fourthQuarterlyTotalBhar += $fourthQuarterlyBhar;
                                }
                                
                            @endphp
                            <tr style="white-space: nowrap;">
                                <td>{{ $estimate->fiscalYear->fiscal_year }}</td>
                                <td>{{ $estimate->name }}</td>
                                <td>{{ $estimate->unit }}</td>
                                <td class="text-right font-kalimati">{{ $estimate->rate }}</td>
                                <td class="text-right font-kalimati">{{ $estimate->quantity }}</td>
                                <td class="text-right font-kalimati">{{ round($cost, 3) }}</td>
                                <td class="text-right font-kalimati">{{ round($bhar, 3) }}</td>

                                @if ($estimate->yearly_target_quantity)
                                    <td class="text-right font-kalimati">{{ $estimate->yearly_target_quantity }}</td>
                                    <td class="text-right font-kalimati">{{ round($yearlyCost, 3) }}</td>
                                    <td class="text-right font-kalimati">{{ round($yearlyBhar, 3) }}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif
                                @if ($estimate->first_quarterly_target_quantity)
                                    <td class="text-right font-kalimati">
                                        {{ $estimate->first_quarterly_target_quantity }}
                                    </td>
                                    <td class="text-right font-kalimati">{{ round($firstQuarterlyCost, 3) }}</td>
                                    <td class="text-right font-kalimati">{{ round($firstQuarterlyBhar, 3) }}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif

                                @if ($estimate->second_quarterly_target_quantity)
                                    <td class="text-right font-kalimati">
                                        {{ $estimate->second_quarterly_target_quantity }}
                                    </td>
                                    <td class="text-right font-kalimati">{{ round($secondQuarterlyCost, 3) }}</td>
                                    <td class="text-right font-kalimati">{{ round($secondQuarterlyBhar, 3) }}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif

                                @if ($estimate->third_quarterly_target_quantity)
                                    <td class="text-right font-kalimati">
                                        {{ $estimate->third_quarterly_target_quantity }}
                                    </td>
                                    <td class="text-right font-kalimati">{{ round($thirdQuarterlyCost, 3) }}</td>
                                    <td class="text-right font-kalimati">{{ round($thirdQuarterlyBhar, 3) }}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif

                                @if ($estimate->fourth_quarterly_target_quantity)
                                    <td class="text-right font-kalimati">
                                        {{ $estimate->fourth_quarterly_target_quantity }}
                                    </td>
                                    <td class="text-right font-kalimati">{{ round($fourthQuarterlyCost, 3) }}</td>
                                    <td class="text-right font-kalimati">{{ round($fourthQuarterlyBhar, 3) }}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif

                                <td>
                                    <div class="">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li><a class="dropdown-item text-center btn"
                                                    href="{{ route('projects.estimate.edit', [$office, $project, $estimate]) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('estimates.destroy', $estimate) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="dropdown-item text-center btn form-control"
                                                        type="submit"
                                                        onclick="return confirm('Are you sure to delete?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="20">
                                    <div class="text-red text-center">
                                        कुनै पनि डाटा उपलब्ध छैन
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        <tr>
                            <th class="text-right font-kalimati" colspan="5">जम्मा</th>
                            <td class="text-right font-kalimati">{{ round($total, 3) }}</td>
                            <td class="text-right font-kalimati">{{ round($totalBhar, 3) }}</td>
                            <td colspan="2" class="text-right font-kalimati">{{ round($yearlyTotalCost, 3) }}</td>
                            <td class="text-right font-kalimati">{{ round($yearlyTotalBhar, 3) }}</td>
                            <td colspan="2" class="text-right font-kalimati">
                                {{ round($firstQuarterlyTotalCost, 3) }}</td>
                            <td class="text-right font-kalimati">{{ round($firstQuarterlyTotalBhar, 3) }}</td>
                            <td colspan="2" class="text-right font-kalimati">
                                {{ round($secondQuarterlyTotalCost, 3) }}</td>
                            <td class="text-right font-kalimati">{{ round($secondQuarterlyTotalBhar, 3) }}</td>
                            <td colspan="2" class="text-right font-kalimati">
                                {{ round($thirdQuarterlyTotalCost, 3) }}</td>
                            <td class="text-right font-kalimati">{{ round($thirdQuarterlyTotalBhar, 3) }}</td>
                            <td colspan="2" class="text-right font-kalimati">
                                {{ round($fourthQuarterlyTotalCost, 3) }}</td>
                            <td class="text-right font-kalimati">
                                {{ round($fourthQuarterlyTotalBhar, 3) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <span class="fw-bold">प्रगति</span>
            </div>
            <div class="col-md-12 bg-white">
                <div>
                    <div class="col-md-12 bg-white">
                        <div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <span class="fw-bold">वित्तीय कारोबार</span>
            </div>
            <div class="col-md-12 bg-white">
                <div>
                    <div class="col-md-12 bg-white">
                        <table class="table table-striped text-sm">
                            <thead style="white-space: nowrap;">
                                <th>आ.ब.</th>
                                <th>मिति</th>
                                <th>खर्चको किसिम</th>
                                <th>खर्च उपशीर्षक न.</th>
                                <th>विवरण</th>
                                <th class="text-right">रकम</th>

                            </thead>
                            <tbody>
                                @php
                                    $totalExpenditure = 0;
                                @endphp
                                @forelse ($project->expenditure as $expenditure)
                                    @php
                                        $totalExpenditure = $totalExpenditure + $expenditure->expenditure;
                                    @endphp
                                    <tr>
                                        <td>{{ $expenditure->fiscalYear->fiscal_year }}</td>
                                        <td><span class="font-kalimati"
                                                id="expenditure-date-{{ $expenditure->id }}"></span></td>
                                        <td>{{ $expenditure->expenditureType->name }}</td>
                                        <td class="font-kalimati">{{ $expenditure->expenditure_subtitle }}</td>
                                        <td>{{ $expenditure->remarks }}</td>
                                        <td class="text-right font-kalimati">{{ $expenditure->expenditure }}</td>

                                    </tr>
                                    @push('scripts')
                                        <script>
                                            $(document).ready(function() {
                                                date1 = NepaliFunctions.AD2BS("{{ $expenditure->date }}");
                                                document.getElementById("expenditure-date-{{ $expenditure->id }}").innerHTML = date1;
                                            });
                                        </script>
                                    @endpush
                                @empty
                                    <tr>
                                        <td colspan="20">
                                            <div class="text-red text-center">
                                                कुनै पनि डाटा उपलब्ध छैन
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td class="text-right" colspan="5">
                                        <span class="fw-bold">जम्मा</span>
                                    </td>
                                    <td class="text-right font-kalimati">
                                        {{ $totalExpenditure }}
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <span class="fw-bold">उपलब्धिहरु</span>
            </div>
            <div class="col-md-12 bg-white">
                <table class="table table-striped text-sm">
                    <thead style="white-space: nowrap;">
                        <th>आ.ब.</th>
                        <th>उपलब्धि</th>
                        <th>उपलब्धिको स्थिति</th>
                    </thead>
                    <tbody>
                        @forelse ($project->acheivement as $acheivement)
                            <tr>
                                <td>{{ $acheivement->fiscalYear->fiscal_year }}</td>
                                <td>{{ $acheivement->name }}</td>
                                <td>
                                    {{ $acheivement->status == true ? 'सम्पन्न भैसकेको छ' : 'समपन्न भएको छैन ' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="20">
                                    <div class="text-red text-center">
                                        कुनै पनि डाटा उपलब्ध छैन
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <span class="fw-bold">कागजात</span>
            </div>
            <div class="col-md-12 my-2">
                <div class="row">
                    @forelse ($project->photo as $photo)
                        <div class="col-md-4 my-2">
                            <div class="position-relative">
                                <a href="{{ url('storage/' . $photo->photo) }}" class="position-relative">
                                    <img class="project-photo" src="{{ asset('storage/' . $photo->photo) }}"
                                        alt="poject-photo">
                                </a>
                            </div>
                            <div class="text-center">
                                <h6>{{ $photo->name }}</h6>
                            </div>
                        </div>
                    @empty
                        <div class="text-red text-center">
                            कुनै पनि डाटा उपलब्ध छैन
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('nepali-datepicker/js/nepali.datepicker.v4.0.1.min.js') }}"></script>
</body>
@stack('scripts')


<script>
    document.getElementById('agreement_date_bs').innerHTML = NepaliFunctions.AD2BS(
        "{{ $project->agreement_date }}");
    document.getElementById('project_start_date_bs').innerHTML = NepaliFunctions.AD2BS(
        "{{ $project->project_start_date }}");
    document.getElementById('project_completion_date_bs').innerHTML = NepaliFunctions.AD2BS(
        "{{ $project->project_completion_date }}");
</script>

</html>
