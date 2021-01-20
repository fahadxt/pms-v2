<div>

    <form enctype="multipart/form-data" class="w-full" wire:submit.prevent="updatedFilters">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-right" for="name">
                    {{__('Search By Title')}}
                </label>
                <input
                    class="appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
                    type="text" wire:model="filter_search" autocomplete="off">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-right" for="name">
                    {{__('Search By User')}}
                </label>
                <input
                    class="appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
                    type="text" wire:model="filter_username" autocomplete="off">
            </div>
        </div>
        

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/1 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-right" for="filter_statuses">
                    {{__('statuses')}}
                </label>
                <div wire:ignore>
                    <select name="filter_statuses[]" multiple id="filter_statuses" class="ui fluid multiple  appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
                        wire:model='filter_statuses'>
                        <option value="" disabled selected></option>
                        @foreach($statuses as $status)
                        <option value="{{$status->id}}">{{$status->display_name}}</option>
                        @endForeach
                    </select>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full  px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-right" for="due_on">
                    {{__('Due on')}}
                </label>
                <input
                    class="appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
                    type="text" id="filter_project_due_on" wire:model.lazy='filter_due_on' autocomplete="off">
            </div>
        </div>

        {{-- range test --}}
        {{-- <div class="w-full px-3">
            
            <div x-data="range()" x-init="mintrigger(); maxtrigger()" class="relative max-w-xl w-full">
                <div>
                 
            
                  <input type="range" 
                         step="100"
                         x-bind:min="min" x-bind:max="max"
                         x-on:input="maxtrigger"
                         x-model="maxprice"
                         class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                    <input type="range"
                         step="100"
                         x-bind:min="min" x-bind:max="max"
                         x-on:input="mintrigger"
                         x-model="minprice"
                         class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">
            
                  <div class="relative z-10 h-2">
            
                    <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
            
                    <div class="absolute z-20 top-0 bottom-0 rounded-md bg-green-300" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>
            
                    <div class="absolute z-30 w-6 h-6 top-0 left-0 bg-green-300 rounded-full -mt-2 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>
            
                    <div class="absolute z-30 w-6 h-6 top-0 right-0 bg-green-300 rounded-full -mt-2 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>
             
                  </div>
            
                </div>
                
                <div class="flex justify-between items-center py-5">
                  <div>
                    <input type="text" maxlength="5" x-on:input="mintrigger" x-model="minprice" class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
                  </div>
                  <div>
                    <input type="text" maxlength="5" x-on:input="maxtrigger" x-model="maxprice" class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
                  </div>
                </div>
                
              </div>
            
            <script>
                function range() {
                    return {
                      minprice: 1000, 
                      maxprice: 7000,
                      min: 100, 
                      max: 10000,
                      minthumb: 0,
                      maxthumb: 0, 
                      
                      mintrigger() {   
                        this.minprice = Math.min(this.minprice, this.maxprice - 500);      
                        this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                      },
                       
                      maxtrigger() {
                        this.maxprice = Math.max(this.maxprice, this.minprice + 500); 
                        this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);    
                      }, 
                    }
                }
            </script>

        </div> --}}

        <div class="flex space-x-4 mb-6">
            <div class="px-3">
                <button class="component border border-transparent rounded font-semibold tracking-wide text-sm px-5 py-2 focus:outline-none focus:shadow-outline bg-blue-500 text-gray-100 hover:bg-blue-600 hover:text-gray-200">
                    {{__('Apply')}}
                    <i class="fas fa-filter"></i>
                </button>
            </div>

            <div class="px-3">
                <button type="button" class="component border border-transparent rounded font-semibold tracking-wide text-sm px-5 py-2 focus:outline-none focus:shadow-outline bg-gray-500 text-gray-100 hover:bg-gray-600 hover:text-gray-200 " wire:click="$emit('restFilters')">
                    {{__('Reset')}}
                    <i class="fas fa-undo"></i>
                </button>
            </div>
        </div>


    </form>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#statuses').dropdown({ 
            fullTextSearch: true,
            clearable: true,
            detachable: false,
        });
        // $('#statuses').on('change', function (e) {
        //     var statuses = $(this).val();
        //     this.set('statuses', statuses);
        // });
    });
</script>
<script>
    $(document).ready(function() {
        $("#filter_project_due_on").flatpickr({
            // enableTime: false,
            dateFormat: "Y-m-d",
            mode: "range"
        });
    });
</script>
@endpush 