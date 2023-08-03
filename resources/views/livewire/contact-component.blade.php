<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> Contact
                </div>
            </div>
        </div>
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 m-auto">
                        <div class="contact-from-area padding-20-row-col wow FadeInUp">
                            <h3 class="mb-10 text-center">Contactez nous</h3>
                            <p class="text-muted mb-30 text-center font-sm">Remplissez ce formulaire pour nous contacter</p>
                            <form class="contact-form-style text-center" id="contact-form"  wire:submit.prevent="sendMessage">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="name" placeholder="First Name" type="text" wire:model="name">
                                            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="email" placeholder="votre Email" type="email" wire:model="email">
                                            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="phone" placeholder="votre téléphone" type="tel" wire:model="phone">
                                            @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="subject" placeholder="Sujet" type="text" wire:model="subject">
                                            @error('subject') <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="textarea-style mb-30">
                                            <textarea name="comment" placeholder="Message" wire:model="comment"></textarea>
                                            @error('comment') <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                        <button class="submit submit-auto-width" type="submit">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
