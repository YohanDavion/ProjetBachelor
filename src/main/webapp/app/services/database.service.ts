import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class DatabaseService {
  private baseUrl = 'https://projetbachelor.database.windows.net';
  private produitsUrl = `${this.baseUrl}/api/produits`;

  constructor(private http: HttpClient) {}

  getProduits(): Observable<any> {
    return this.http.get(this.produitsUrl);
  }
}
