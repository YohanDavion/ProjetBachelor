import { Component, Input } from '@angular/core';
import {MenuItem} from 'primeng/api';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent {

  items: MenuItem[]=[];
  @Input() activeItem!: MenuItem;

  ngOnInit() {
      this.items = [
          {label: 'Home', icon: 'pi pi-fw pi-home'},
          {label: 'Calendar', icon: 'pi pi-fw pi-calendar'},
          {label: 'Edit', icon: 'pi pi-fw pi-pencil'},
          {label: 'Documentation', icon: 'pi pi-fw pi-file'},
          {label: 'Settings', icon: 'pi pi-fw pi-cog'}
      ];

      this.activeItem = this.items[0];
    }
}
