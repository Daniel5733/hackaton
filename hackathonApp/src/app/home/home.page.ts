import { Component } from '@angular/core';
import { DataService } from '../services/data.service';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  clientes = [];
  constructor(private data: DataService) {}

  refresh(ev) {
    setTimeout(() => {
      ev.detail.complete();
    }, 3000);
  }

  getClientes() {
    this.data.getAll()
      .then((result: any) => {
        this.clientes = result.data
      })
      .catch((error: any) => {
       console.log('error');
      });
  }

}
