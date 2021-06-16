<div>
    <td data-label="Quantity">
        <div class="form-group--number">
            {{--<button class="up">+</button>
            <button class="down">-</button>--}}
            <input 
              class="form-control"
              type="number"
              name="quantity"
              wire:model.defer="quantity"
              id="quantity" 
              min="1" 
              placeholder="1" 
              value="{{$qty}}"
              data-itemid="{{$itemId}}"
            >
        </div>
    </td>
</div>
