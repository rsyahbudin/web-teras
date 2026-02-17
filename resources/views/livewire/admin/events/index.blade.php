<div class="flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold dark:text-white">Event Packages</h1>
        <flux:button variant="primary" icon="plus" wire:click="create">Add Package</flux:button>
    </div>

    <!-- Packages Table -->
    <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-zinc-500 border-b border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900/50">
                    <tr>
                        <th class="py-3 px-4">Image</th>
                        <th class="py-3 px-4">Name</th>
                        <th class="py-3 px-4">Price</th>
                        <th class="py-3 px-4">Features</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    @forelse($packages as $package)
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-700/50 transition-colors">
                            <td class="py-3 px-4">
                                <div class="w-12 h-12 rounded-lg bg-zinc-100 dark:bg-zinc-700 overflow-hidden">
                                    @if($package->image)
                                        <img src="{{ $package->image }}" alt="{{ $package->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-zinc-400">
                                            <flux:icon.photo class="w-6 h-6" />
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-4 font-medium text-zinc-900 dark:text-zinc-100">{{ $package->name }}</td>
                            <td class="py-3 px-4 font-mono">Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 text-zinc-500">
                                @if(is_array($package->features))
                                    {{ count($package->features) }} features
                                @else
                                    -
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <flux:button size="sm" icon="pencil-square" wire:click="edit({{ $package->id }})">Edit</flux:button>
                                    <flux:button size="sm" variant="danger" icon="trash" wire:confirm="Delete this package?" wire:click="delete({{ $package->id }})">Delete</flux:button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-zinc-500">
                                <flux:icon.calendar class="w-12 h-12 mx-auto text-zinc-300 dark:text-zinc-600 mb-4" />
                                <h3 class="text-lg font-medium text-zinc-900 dark:text-zinc-100">No Packages Yet</h3>
                                <p class="mb-6">Create your first event package.</p>
                                <flux:button variant="primary" icon="plus" wire:click="create">Add Package</flux:button>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-zinc-200 dark:border-zinc-700">
            {{ $packages->links() }}
        </div>
    </div>

    <!-- Package Modal -->
    <flux:modal wire:model="showModal" class="min-w-[600px]">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-6">{{ $packageId ? 'Edit Package' : 'Create Package' }}</h2>
            
            <form wire:submit="save" class="space-y-6">
                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-medium mb-2">Package Image</label>
                    <div class="flex items-center gap-4">
                        <div class="w-24 h-24 rounded-lg bg-zinc-100 dark:bg-zinc-700 overflow-hidden border border-zinc-200 dark:border-zinc-600">
                            @if($newImage)
                                <img src="{{ $newImage->temporaryUrl() }}" class="w-full h-full object-cover">
                            @elseif($image)
                                <img src="{{ $image }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-zinc-400">
                                    <flux:icon.photo class="w-8 h-8" />
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <input type="file" wire:model="newImage" class="block w-full text-sm text-zinc-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition-colors">
                            <p class="text-xs text-zinc-500 mt-1">PNG, JPG, GIF up to 1MB</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <flux:input label="Name" wire:model="name" placeholder="E.g., Wedding Package A" />
                    <flux:input label="Price" type="number" wire:model="price" prefix="Rp" />
                </div>

                <flux:textarea label="Description" wire:model="description" rows="2" />

                <flux:textarea label="Features (One per line)" wire:model="features" rows="5" placeholder="Buffet Lunch&#10;Free Flow Water&#10;Decorations" />

                <div class="flex justify-end gap-2 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button wire:click="$set('showModal', false)">Cancel</flux:button>
                    <flux:button variant="primary" type="submit">Save Package</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
