<div class="flex flex-col gap-6">
    @if (session()->has('success'))
        <div class="bg-green-50 text-green-700 p-4 rounded-lg border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold dark:text-white">Menu Management</h1>
        <div class="flex gap-2">
            <flux:button icon="arrow-down-tray" wire:click="openImportModal" wire:loading.attr="disabled">Import</flux:button>
            <flux:button icon="tag" wire:click="manageCategories">Categories</flux:button>
            <flux:button variant="primary" icon="plus" wire:click="createItem">Add Item</flux:button>
        </div>
    </div>

    <!-- Items Table -->
    <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-zinc-500 border-b border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900/50">
                    <tr>
                        <th class="py-3 px-4">Image</th>
                        <th class="py-3 px-4">Name</th>
                        <th class="py-3 px-4">Category</th>
                        <th class="py-3 px-4">Price</th>
                        <th class="py-3 px-4 text-center">Featured</th>
                        <th class="py-3 px-4 text-center">Available</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    @forelse($items as $item)
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-700/50 transition-colors">
                            <td class="py-3 px-4">
                                <div class="w-12 h-12 rounded-lg bg-zinc-100 dark:bg-zinc-700 overflow-hidden">
                                    @if($item->image)
                                        <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-zinc-400">
                                            <flux:icon.photo class="w-6 h-6" />
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-4 font-medium text-zinc-900 dark:text-zinc-100">{{ $item->name }}</td>
                            <td class="py-3 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-zinc-100 text-zinc-800 dark:bg-zinc-700 dark:text-zinc-300">
                                    {{ $item->category->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 font-mono">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 text-center">
                                @if($item->is_featured)
                                    <flux:icon.star class="w-5 h-5 text-amber-500 inline-block" solid />
                                @else
                                    <span class="text-zinc-300 dark:text-zinc-600">-</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                @if($item->is_available)
                                    <flux:icon.check-circle class="w-5 h-5 text-green-500 inline-block" />
                                @else
                                    <flux:icon.x-circle class="w-5 h-5 text-red-500 inline-block" />
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <flux:button size="sm" icon="pencil-square" wire:click="editItem({{ $item->id }})">Edit</flux:button>
                                    <flux:button size="sm" variant="danger" icon="trash" wire:confirm="Are you sure you want to delete this item?" wire:click="deleteItem({{ $item->id }})">Delete</flux:button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-zinc-500">
                                <flux:icon.document-text class="w-12 h-12 mx-auto text-zinc-300 dark:text-zinc-600 mb-4" />
                                <h3 class="text-lg font-medium text-zinc-900 dark:text-zinc-100">No Items Found</h3>
                                <p class="mb-6">Start by adding a new menu item.</p>
                                <flux:button variant="primary" icon="plus" wire:click="createItem">Create Item</flux:button>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-zinc-200 dark:border-zinc-700">
            {{ $items->links() }}
        </div>
    </div>

    <!-- Item Modal -->
    <flux:modal wire:model="showItemModal" class="min-w-[600px]">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-6">{{ $itemId ? 'Edit Item' : 'Create Item' }}</h2>
            
            <form wire:submit="saveItem" class="space-y-6">
                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-medium mb-2">Item Image</label>
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
                            <p class="text-xs text-zinc-500 mt-1">PNG, JPG, GIF up to 1MB. Recommended: 800x800px (Square 1:1)</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <flux:input label="Name" wire:model="name" placeholder="E.g., Nasi Goreng Special" />
                    <flux:input label="Price" type="number" wire:model="price" prefix="Rp" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Category</label>
                    <select wire:model="menu_category_id" class="w-full rounded-lg border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-900 focus:ring-primary focus:border-primary">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('menu_category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <flux:textarea label="Description" wire:model="description" rows="3" />

                <div class="flex gap-6">
                    <flux:checkbox label="Available" wire:model="is_available" />
                    <flux:checkbox label="Featured" wire:model="is_featured" />
                </div>

                <div class="flex justify-end gap-2 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button wire:click="$set('showItemModal', false)">Cancel</flux:button>
                    <flux:button variant="primary" type="submit">Save Item</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    <!-- Category Modal -->
    <flux:modal wire:model="showCategoryModal" class="min-w-[500px]">
        <div class="p-6 h-[80vh] flex flex-col">
            <h2 class="text-xl font-bold mb-6">Manage Categories</h2>

            <div class="flex-1 overflow-y-auto pr-2 space-y-6">
                <!-- Create/Edit Form -->
                <div class="bg-zinc-50 dark:bg-zinc-900/50 p-4 rounded-lg border border-zinc-200 dark:border-zinc-700">
                    <h3 class="font-medium mb-3 text-sm uppercase tracking-wider text-zinc-500">{{ $categoryId ? 'Edit Category' : 'New Category' }}</h3>
                    <div class="space-y-3">
                        <flux:input label="Name" wire:model="categoryName" placeholder="Category Name" />
                        <flux:textarea label="Description" wire:model="categoryDescription" rows="2" placeholder="Optional description" />
                        <div class="flex justify-end gap-2">
                             @if($categoryId)
                                <flux:button size="sm" wire:click="resetCategoryForm">Cancel Edit</flux:button>
                            @endif
                            <flux:button size="sm" variant="primary" wire:click="saveCategory">{{ $categoryId ? 'Update' : 'Add' }}</flux:button>
                        </div>
                    </div>
                </div>

                <!-- List -->
                <div class="space-y-2">
                    <h3 class="font-medium text-sm uppercase tracking-wider text-zinc-500 mb-2">Existing Categories</h3>
                    @foreach($categories as $category)
                        <div class="flex items-center justify-between p-3 bg-white dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700 hover:border-primary/50 transition-colors group">
                            <div>
                                <div class="font-medium">{{ $category->name }}</div>
                                <div class="text-xs text-zinc-500">{{ $category->items->count() }} items</div>
                            </div>
                            <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <flux:button size="xs" icon="pencil-square" wire:click="editCategory({{ $category->id }})"></flux:button>
                                <flux:button size="xs" variant="danger" icon="trash" wire:confirm="Delete this category?" wire:click="deleteCategory({{ $category->id }})"></flux:button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="pt-4 mt-4 border-t border-zinc-200 dark:border-zinc-700 flex justify-end">
                <flux:button wire:click="$set('showCategoryModal', false)">Close</flux:button>
            </div>
        </div>
    </flux:modal>

    <!-- Import Modal -->
    <flux:modal wire:model="showImportModal" class="min-w-[400px]">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-4">Import Menu Items</h2>
            <p class="text-sm text-zinc-500 mb-6">Upload a CSV file to bulk import menu items. Ensure the format matches the template.</p>
            
            <form wire:submit="importMenu" class="space-y-6">
                <div class="bg-zinc-50 dark:bg-zinc-900/50 p-4 rounded-lg border border-zinc-200 dark:border-zinc-700 mb-4">
                    <div class="flex items-center justify-between">
                         <span class="text-sm font-medium">1. Download Template</span>
                         <flux:button size="sm" icon="arrow-down" wire:click="downloadTemplate">Download CSV</flux:button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">2. Upload CSV File</label>
                    <input type="file" wire:model="importFile" class="block w-full text-sm text-zinc-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition-colors">
                    @error('importFile') <span class="text-red-500 text-sm block mt-1">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex justify-end gap-2 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button wire:click="$set('showImportModal', false)">Cancel</flux:button>
                    <flux:button variant="primary" type="submit">Import</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
