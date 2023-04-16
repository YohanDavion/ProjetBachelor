import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';

import { SharedModule } from 'app/shared/shared.module';
import { HOME_ROUTE } from './home.route';
import { HomeComponent } from './home.component';
import { ToastModule } from 'primeng/toast';
import { RippleModule } from 'primeng/ripple';

@NgModule({
  imports: [SharedModule, ToastModule, RippleModule, RouterModule.forChild([HOME_ROUTE])],
  declarations: [HomeComponent],
  bootstrap: [HomeComponent],
})
export class HomeModule {}
