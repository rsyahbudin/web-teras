<div class="flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold dark:text-white">Website Content</h1>
            <p class="text-zinc-500 text-sm">Manage text and images for specific page sections.</p>
        </div>
    </div>

    <!-- Sections Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($sections as $key => $section)
            <div wire:click="editSection('{{ $key }}')" class="bg-white dark:bg-zinc-800 rounded-xl p-6 border border-zinc-200 dark:border-zinc-700 hover:border-primary/50 cursor-pointer transition-all hover:shadow-md group relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-0 group-hover:opacity-100 transition-opacity">
                    <flux:icon.pencil-square class="w-5 h-5 text-primary" />
                </div>
                
                <h3 class="font-bold text-lg mb-2 group-hover:text-primary transition-colors">{{ $section['label'] }}</h3>
                <p class="text-sm text-zinc-500 mb-4 h-10 overflow-hidden">{{ $section['description'] }}</p>
                
                <div class="flex items-center gap-2 text-xs font-medium text-zinc-400">
                    <span class="bg-zinc-100 dark:bg-zinc-700 px-2 py-1 rounded">{{ count($section['fields']) }} Fields</span>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Edit Section Modal/Drawer -->
    <flux:modal wire:model="activeSection" class="min-w-[700px]">
        @if($activeSection)
            <div class="p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-bold">{{ $sections[$activeSection]['label'] }}</h2>
                    <p class="text-zinc-500 text-sm">{{ $sections[$activeSection]['description'] }}</p>
                </div>

                <form wire:submit="saveSection" class="space-y-6">
                    @foreach($sections[$activeSection]['fields'] as $field)
                        <div wire:key="{{ $field['key'] }}">
                            @if($field['type'] === 'image')
                                <label class="block text-sm font-medium mb-2">{{ $field['label'] }}</label>
                                <div class="flex items-center gap-4">
                                    <div class="w-40 h-24 rounded-lg bg-zinc-100 dark:bg-zinc-700 overflow-hidden border border-zinc-200 dark:border-zinc-600 relative group">
                                        @if(isset($newImages[$field['key']]))
                                            <img src="{{ $newImages[$field['key']]->temporaryUrl() }}" class="w-full h-full object-cover">
                                        @elseif(!empty($sectionData[$field['key']]))
                                            <img src="{{ $sectionData[$field['key']] }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex flex-col items-center justify-center text-zinc-400">
                                                <flux:icon.photo class="w-8 h-8 mb-1" />
                                                <span class="text-[10px]">No Image</span>
                                            </div>
                                        @endif

                                        <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                            <label class="cursor-pointer bg-white text-zinc-900 px-3 py-1.5 rounded-full text-xs font-medium shadow-lg hover:bg-zinc-50">
                                                Change
                                                <input type="file" wire:model="newImages.{{ $field['key'] }}" class="hidden">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-xs text-zinc-500">
                                        <p>Recommended size: 1920x1080 (Hero) or 800x600 (Cards).</p>
                                    </div>
                                </div>
                            @elseif($field['type'] === 'textarea')
                                <flux:textarea 
                                    label="{{ $field['label'] }}" 
                                    wire:model="sectionData.{{ $field['key'] }}" 
                                    rows="3" 
                                />
                            @else
                                <flux:input 
                                    label="{{ $field['label'] }}" 
                                    wire:model="sectionData.{{ $field['key'] }}" 
                                />
                            @endif
                        </div>
                    @endforeach

                    <div class="flex justify-end gap-2 pt-6 border-t border-zinc-200 dark:border-zinc-700">
                        <flux:button wire:click="cancelEdit">Cancel</flux:button>
                        <flux:button variant="primary" type="submit">Save Changes</flux:button>
                    </div>
                </form>
            </div>
        @endif
    </flux:modal>
</div>
