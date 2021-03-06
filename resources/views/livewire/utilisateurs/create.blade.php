<div class="row  p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouvel administrateur</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" wire:submit.prevent="addUser()">
              @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Nom Complet</label>
                <input type="text" class="form-control @error('newUser.name') is-ivalid @enderror" wire:model="newUser.name">
               @error("newUser.name")
                   <span class="text-danger">{{ $message }}</span>
               @enderror
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control @error('newUser.email') is-ivalid @enderror" wire:model="newUser.email">
                @error("newUser.email")
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              <div class="form-group">
                <label>Sexe</label>
                <select class="form-control @error('newUser.email') is-ivalid @enderror" wire:model="newUser.sexe">
                    <option>------------</option>
                    <option value="H">Homme</option>
                    <option value="F">Femme</option>
                </select>
                @error("newUser.sexe")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              
              <div class="form-group">
                <label>Adresse</label>
                <input type="text" class="form-control @error('newUser.adresse') is-ivalid @enderror" wire:model="newUser.adresse">
                @error("newUser.adresse")
                <span class="text-danger">{{ $message }}</span>
                @enderror
             </div>
            <div class="d-flex">
              <div class="form-group flex-grow-1 mr-2">
                <label>Pays</label>
                <input type="text" class="form-control @error('newUser.pays') is-ivalid @enderror"  wire:model="newUser.pays">
                @error("newUser.pays")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group flex-grow-1">
                <label>Ville</label>
                <input type="text" class="form-control @error('newUser.ville') is-ivalid @enderror" wire:model="newUser.ville">
                @error("newUser.ville")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>  
            <div class="form-group">
                <label>Contact</label>
                <input type="number" class="form-control @error('newUser.contact') is-ivalid @enderror" wire:model="newUser.contact">
                @error("newUser.contact")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label >Password</label>
                <input type="text" class="form-control" disabled placeholder="Password">
              </div>
            <!--  <div class="form-group">
                <label >Photo</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
            </div>-->
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
              <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retourner à la liste des administrateurs</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
    </div>
</div>

<script>
    window.addEventListener("ShowSuccessMessage", event=>{
        Swal.fire({
            position : 'top-end',
            icon: 'success',
            toast:true,
            title:event.detail.message || 'Opération effecctuée avec succès!!',
            showConfirmButton: false,
            timer: 3000
        })
    })
</script>