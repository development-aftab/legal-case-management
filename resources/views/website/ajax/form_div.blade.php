                                        @foreach ($OriginatingProcessed as $key=>$element)
                                              {{-- expr --}}
                                            
                                                <a href="" class="multiple">
                                                    <label class="z_filelabel">
                                                    <input type="hidden" name="{{ $filrname }}[{{ $key }}][id]" value="{{ $element->id }}">
                                                    <input style="display: none" class="form-control fileInput {{ $filrname }}" data-case_originates="{{ $element->originate_id }}" data-filrname="{{ $filrname }}" data-index="{{ $key }}" id="input" type="file" name="{{ $filrname }}[{{ $key }}][file]" accept="application/pdf">
                                                     <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">
                                                    </label> 

                                                </a>
                                            @if ($key == 0)
                                                <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="{{ $filrname }}" data-index="{{ count($OriginatingProcessed)-1 }}" >Add More Files</button>
                                            @endif    
                                            
                                            <p class="">
                                                <span>Notes</span>
                                                <input type="hidden" name="{{ $filrname }}[{{ $key }}][case_originates]" value="{{ $element->originate_id }}">
                                                <textarea name="{{ $filrname }}[{{ $key }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                <input type="date" name="{{ $filrname }}[{{ $key }}][date]" value="{{ $element->date }}">
                                            </p>
                                        @endforeach  







