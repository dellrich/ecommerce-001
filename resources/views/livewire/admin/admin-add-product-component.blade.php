<div>
    <style>
        /* pagination formatage du bas de page pour les numero et le suivante et precedent */

        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> Ajoute de produit

                </div>
            </div>
        </div>
        <x:notify-messages />

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Ajouter un nouveau produit
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.products') }}" class="btn btn-success float-end">Tous
                                            les produits</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="addProduct">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Nom</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Nom du produit" wire:model="name" wire:keyup="generateSlug">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">slug</label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="Nom du produit" wire:model="slug">
                                        @error('slug')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="court_description" class="form-label">courte description</label>
                                        <textarea type="text" name="court_description" id="court_description" class="form-control"
                                            placeholder="court_description du produit" wire:model="court_description"></textarea>
                                        @error('court_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea type="text" name="description" id="description" class="form-control" placeholder="description du produit"
                                            wire:model="description"></textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="prix_normale" class="form-label">prix normal</label>
                                        <input type="text" name="prix_normale" class="form-control"
                                            placeholder="prix de vente" wire:model="prix_normale">
                                        @error('prix_normale')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="mb-3 mt-3">
                                        <label for="prix_promo" class="form-label">prix promo</label>
                                        <input type="text" name="prix_promo" class="form-control"
                                            placeholder="prix promotionel" wire:model="prix_promo">
                                        @error('prix_promo')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="QR_code" class="form-label">QR code</label>
                                        <input type="text" name="QR_code" class="form-control" placeholder="QR code"
                                            wire:model="QR_code">
                                        @error('QR_code')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="status_stock" class="form-label">Disponibilité</label>
                                        <select class="form-control" name="status_stock" wire:model="status_stock">
                                            <option value="enstock">En stock</option>
                                            <option value="hors_stock">Hors stock</option>
                                        </select>
                                        @error('status_stock')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="en_vedette" class="form-label">En vedette</label>
                                        <select class="form-control" name="en_vedette" wire:model="en_vedette">
                                            <option value="0">NON</option>
                                            <option value="1">OUI</option>
                                        </select>
                                        @error('en_vedette')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="quantite" class="form-label">Quantité</label>
                                        <input type="text" name="quantite" class="form-control"
                                            placeholder="saisir la quantité" wire:model="quantite">
                                        @error('quantite')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">image</label>
                                        <input type="file" name="image" class="form-control"
                                            wire:model="image">
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120"
                                                alt="image du produit">
                                        @endif
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Gallerie d'image</label>
                                        <input type="file" name="images" class="form-control row right"
                                            wire:model="images" multiple>

                                        @if ($images)
                                            @foreach ($images as $image)
                                                <img src="{{ $image->temporaryUrl() }}" width="120"
                                                    alt="image du produit">
                                            @endforeach

                                        @endif
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="category_id" class="form-label">Catégorie</label>
                                        <select class="form-control" name="category_id" wire:model="category_id"
                                            wire:change="changeSouscategory">
                                            <option value="">Choisir une catégorie</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            <div class="row ">
                                                {{ asset('assets/imgs/products') }}/{{ $product->image }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="souscategory_id" class="form-label">Sous Catégorie</label>
                                        <select class="form-control" name="souscategory_id"
                                            wire:model="souscategory_id">
                                            <option value="0">Choisir une sous-catégorie</option>
                                            @foreach ($scategories as $scategory)
                                                <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('souscategory_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            <div class="row ">
                                                {{ asset('assets/imgs/products') }}/{{ $product->image }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="control-form">
                                       
                                            <label for="attri" class="col-md-4 control-label">Attribues du produit</label>
                                            <div class="col-md-3">
                                                <select class="form-control" name="attri" wire:model="attri">
                                                    <option value="0">Choisir un attribue</option>
                                                    @foreach ($pattributes as $pattribut)
                                                        <option value="{{ $pattribut->id }}">{{ $pattribut->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                

                                            </div>
                                            
                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-info" wire:click.prevent="add"> add</button>
    
                                            </div>
                                            
                                        

                                    </div>
                                    @foreach ($inputs as $key => $value)
                                    <div class="col-md-3">
                                        <label for="co" class="form-label">{{ $pattributes->where('id',$attribute_arr[$key])->first()->name }}</label>
                                        <input type="text" class="form-control" placeholder="{{ $pattributes->where('id',$attribute_arr[$key])->first()->name }}"
                                            wire:model="attribute_values.{{ $value }}">
                                        
                                    </div>
                                    <div class="col-md-1">
                                        <button type="text"  class="btn btn-danger btn-sm" wire:click.prevent="remove({{ $key }})">supprimer</button>
                                    </div>

                                        
                                    @endforeach


                                    <button type="submit" class="btn btn-primary float-end">Enregistrer</button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main>
</div>

@push('scripts')
    <script>
        $(function() {
            tinymce.init({
                selector: '#court_description',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tineMCE.triggerSave();
                        var sd_data = $('#court_description').val();
                        @this.set('court_description', sd_data);

                    });
                }
            });

            tinymce.init({
                selector: '#description',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tineMCE.triggerSave();
                        var sd_data = $('#description').val();
                        @this.set('description', sd_data);

                    });
                }
            });
        });
    </script>
@endpush
