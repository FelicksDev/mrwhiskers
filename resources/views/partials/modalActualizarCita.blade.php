  <!-- Ventana modal -->
  <div class="modal fade" id="modal-cita-{{ $cita->id_cita }}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalDetallesLabel">Detalles de la Cita</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-4">
              <!-- Contenido de la ventana modal -->
              <div class="row">
                  <div class="col-md-6">
                      <p><strong>ID de la cita:</strong> {{ $cita->id_cita }}</p>
                      <p><strong>Cliente:</strong>
                          {{ $cita->nombre . ' ' . $cita->apellido }}</p>
                      <p><strong>Descripción:</strong> {{ $cita->descripcion }}</p>
                  </div>
                  <div class="col-md-6">
                      <p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
                      <p><strong>Hora:</strong> {{ $cita->hora }}</p>
                      <p><strong>Tipo de cita:</strong> {{ $cita->tipo_de_cita }}</p>
                      <p><strong>Estado:</strong> {{ $cita->estado_de_cita }}</p>
                  </div>
              </div>

              <!-- Opciones para cambiar el estado de la cita -->
              <form action="{{ route('admin.actualizarEstadoCita', $cita->id_cita) }}" method="POST">
                  @csrf
                  <div class="form-group">
                      <label for="estado">Cambiar Estado:</label>
                      <select class="form-control" name="estado" id="estado">
                          <option value="Pendiente">Pendiente</option>
                          <option value="Completada">Completada</option>
                          <option value="Cancelada">Cancelada</option>
                      </select>
                  </div>
                  <button type="submit" class="btn btn-primary"
                      onclick="confirmacion(event)">Guardar Cambios</button>
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary"
                  data-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>