<div class=" flex" x-data="{hover: false}" @mouseover="hover = true" @mouseover.away="hover = false">
     <div class="dark:bg-background px-4">
          <x-icon name="file" class="fill-text h-12 w-12 mt-4" />
          <x-icon name="stack" class="fill-text h-12 w-12 mt-4" />
     </div>
     <div x-show="hover" x-transition.origin.left x-transition.duration.200ms>
          <div class="dark:bg-background absolute px-4 h-full">
               <x-icon name="file" class="fill-text h-12 w-12 mt-4" />
               <x-icon name="stack" class="fill-text h-12 w-12 mt-4" />
          </div>
     </div>
</div>