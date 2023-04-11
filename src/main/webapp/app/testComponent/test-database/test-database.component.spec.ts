import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TestDatabaseComponent } from './test-database.component';

describe('TestDatabaseComponent', () => {
  let component: TestDatabaseComponent;
  let fixture: ComponentFixture<TestDatabaseComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [TestDatabaseComponent],
    }).compileComponents();

    fixture = TestBed.createComponent(TestDatabaseComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
