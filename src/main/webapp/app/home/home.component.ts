import { Component, OnInit, OnDestroy } from '@angular/core';
import { Router } from '@angular/router';
import { Subject } from 'rxjs';
import { takeUntil } from 'rxjs/operators';

import { AccountService } from 'app/core/auth/account.service';
import { Account } from 'app/core/auth/account.model';

import { SharedService } from '../services/shared.service';
import { MessageService, PrimeNGConfig } from 'primeng/api';

@Component({
  selector: 'jhi-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
  providers: [MessageService],
})
export class HomeComponent implements OnInit, OnDestroy {
  account: Account | null = null;

  private readonly destroy$ = new Subject<void>();

  constructor(
    private accountService: AccountService,
    private router: Router,
    private sharedService: SharedService,
    private messageService: MessageService,
    private primeNGConfig: PrimeNGConfig
  ) {}

  ngOnInit(): void {
    this.accountService
      .getAuthenticationState()
      .pipe(takeUntil(this.destroy$))
      .subscribe(account => (this.account = account));

    this.primeNGConfig.ripple = true;
  }

  login(): void {
    this.router.navigate(['/login']);
  }

  ngOnDestroy(): void {
    this.destroy$.next();
    this.destroy$.complete();
  }

  simulateConnection(): void {
    this.sharedService.isConnected = !this.sharedService.isConnected;
  }
  getConnectionStatus(): boolean {
    return this.sharedService.isConnected;
  }

  show() {
    this.messageService.add({ key: 'bc', severity: 'success', summary: 'Success', detail: 'Message Content', life: 300000 });
  }
}
