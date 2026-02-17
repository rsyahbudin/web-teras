<div class="flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold dark:text-white">Gallery Management</h1>
        <flux:button variant="primary" icon="plus" wire:click="create">Add Image</flux:button>
    </div>

    <!-- Gallery Table -->
    <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-zinc-500 border-b border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900/50">
                    <tr>
                        <th class="py-3 px-4">Image</th>
                        <th class="py-3 px-4">Title</th>
                        <th class="py-3 px-4">Category</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    @forelse($galleries as $gallery)
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-700/50 transition-colors">
                            <td class="py-3 px-4">
                                <div class="w-16 h-12 rounded-lg bg-zinc-100 dark:bg-zinc-700 overflow-hidden">
                                    @if($gallery->image_path)
                                        <img src="{{ $gallery->image_path }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-zinc-400">
                                            <flux:icon.photo class="w-6 h-6" />
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-4 font-medium text-zinc-900 dark:text-zinc-100">{{ $gallery->title }}</td>
                            <td class="py-3 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                                    {{ $gallery->category }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <flux:button size="sm" icon="pencil-square" wire:click="edit({{ $gallery->id }})">Edit</flux:button>
                                    <flux:button size="sm" variant="danger" icon="trash" wire:confirm="Delete this image?" wire:click="delete({{ $gallery->id }})">Delete</flux:button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center text-zinc-500">
                                <flux:icon.photo class="w-12 h-12 mx-auto text-zinc-300 dark:text-zinc-600 mb-4" />
                                <h3 class="text-lg font-medium text-zinc-900 dark:text-zinc-100">No Images Yet</h3>
                                <p class="mb-6">Upload your first gallery image.</p>
                                <flux:button variant="primary" icon="plus" wire:click="create">Add Image</flux:button>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-zinc-200 dark:border-zinc-700">
            {{ $galleries->links() }}
        </div>
    </div>

    <!-- Gallery Modal -->
    <flux:modal wire:model="showModal" class="min-w-[500px]">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-6">{{ $galleryId ? 'Edit Image' : 'Add Image' }}</h2>
            
            <form wire:submit="save" class="space-y-6">
                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-medium mb-2">Image</label>
                    <div class="flex items-center gap-4">
                        <div class="w-full h-48 rounded-lg bg-zinc-100 dark:bg-zinc-700 overflow-hidden border border-zinc-200 dark:border-zinc-600 relative group">
                            @if($newImage)
                                <img src="{{ $newImage->temporaryUrl() }}" class="w-full h-full object-cover">
                            @elseif($image)
                                <img src="{{ $image }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-zinc-400">
                                    <flux:icon.photo class="w-10 h-10 mb-2" />
                                    <span class="text-xs">No image selected</span>
                                </div>
                            @endif
                            
                            <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <label class="cursor-pointer bg-white text-zinc-900 px-4 py-2 rounded-full text-sm font-medium shadow-lg hover:bg-zinc-50">
                                    Change Image
                                    <input type="file" wire:model="newImage" class="hidden">
                                </label>
                            </div>
                        </div>
                    </div>
                     @error('newImage') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <flux:input label="Title" wire:model="title" placeholder="Image Title" />
                
                <div>
                    <label class="block text-sm font-medium mb-1">Category</label>
                    <select wire:model="category" class="w-full rounded-lg border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-900 focus:ring-primary focus:border-primary">
                        <option value="General">General</option>
                        <option value="Wedding">Wedding</option>
                        <option value="Event">Event</option>
                        <option value="Dining">Dining</option>
                        <option value="Interior">Interior</option>
                        <option value="Exterior">Exterior</option>
                    </select>
                </div>

                <div class="flex justify-end gap-2 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button wire:click="$set('showModal', false)">Cancel</flux:button>
                    <flux:button variant="primary" type="submit">Save</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
