<div class="row  p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Payer un Ticket</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" wire:submit.prevent="save()">
              @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Libelle Ticket</label>
                <input type="text" class="form-control @error('newTicket.lib_ticket') is-ivalid @enderror" wire:model="newTicket.lib_ticket">
               @error("newTicket.lib_ticket")
                   <span class="text-danger">{{ $message }}</span>
               @enderror
              </div>
              <div class="form-group">
                <label>Mode de paiement</label>
                <select class="form-control @error('newTicket.mode_paiement') is-ivalid @enderror" wire:model="newTicket.mode_paiement">
                    <option>No select</option>
                    <option value="mode_paiement">Flooz</option>
                    <option value="mode_paiement">TMoney</option>
                    <option value="mode_paiement">Carte Bancaire</option>
                    <option value="mode_paiement">Cash</option>
                </select>
                @error("newTicket.mode_paiement")
                <span class="text-danger">{{ $message }}</span>
                @enderror

              {{--  <div class="form-group">
                <label>Mode de paiement</label>
                <input type="text" class="form-control @error('newTicket.mode_paiement') is-ivalid @enderror" wire:model="newTicket.mode_paiement">
                @error("newTicket.mode_paiement")
                <span class="text-danger">{{ $message }}</span>
              @enderror
              </div> --}}

              <div class="form-group">
                <label>Evenement</label>
                <select class="form-control @error('newTicket.evenement_id') is-ivalid @enderror" wire:model="newTicket.evenement_id">
                    <option>No select</option>
                    @foreach ($evenements as $evenement )
                    <option value="{{ $evenement->id }}">{{ $evenement->nom }}</option>
                    @endforeach
                </select>
                @error("newTicket.evenement_id")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Type Ticket</label>
                <select class="form-control @error('newTicket.type_ticket') is-ivalid @enderror" wire:model="newTicket.type_ticket">
                    <option>No select</option>
                    @foreach ($type_tickets as $type_ticket )
                    <option value="{{ $type_ticket->id }}">{{ $type_ticket->libelle_tiket}}</option>
                    @endforeach
                </select>
                @error("newTicket.type_ticket")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Acheter</button>
              <button type="button"  class="btn btn-danger">Annuler</button>
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
            title:event.detail.message || 'Op??ration effecctu??e avec succ??s!!',
            showConfirmButton: false,
            timer: 3000
        })
    })
</script>
