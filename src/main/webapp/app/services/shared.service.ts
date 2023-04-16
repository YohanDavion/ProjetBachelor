import { Injectable, Output } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class SharedService {
  constructor() {}

  isConnected: boolean = false;

  login(): void {
    this.isConnected = true;
  }

  logout(): void {
    this.isConnected = false;
  }
}
