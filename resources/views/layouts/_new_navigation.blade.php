<div class="flex" x-data="{hover: false}" @mouseover="hover = true" @mouseover.away="hover = false">
     <div class="dark:bg-background">

          <x-new-navigation.icon-link icon="file" :first="true" href="/" :active="request()->routeIs('documents.*')" />

          <x-new-navigation.icon-link icon="stack" :href="route('templates.index')" :active="request()->routeIs('templates.*')" />

          <x-new-navigation.icon-link icon="person" :href="route('profile.edit')" :active="request()->routeIs('profile.*')" />
     </div>
     <div x-show="hover"
     x-transition.origin.left x-transition.duration.200ms
     >
          <div class="dark:bg-background absolute h-full w-80 pr-4">
               <x-new-navigation.link icon="file" :first="true" href="/">Documents</x-new-navigation.link>

               <x-new-navigation.link icon="stack" :href="route('templates.index')">Templates</x-new-navigation.link>

               <x-new-navigation.link icon="person" :href="route('profile.edit')">{{ Auth::user()->name }}</x-new-navigation.link>
               
               <div class="text-red-500 h-12 text-xl flex flex-col justify-center bg-background">
                    <form action="/logout" method="post">
                         @csrf
                         <button type="submit">Log Out</button>
                    </form>
               </div>
          </div>
     </div>
</div>