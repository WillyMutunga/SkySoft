from django.contrib import admin
from .models import Product

@admin.register(Product)
class ProductAdmin(admin.ModelAdmin):
    list_display = ('model', 'price', 'capacity', 'theme', 'createdAt')
    search_fields = ('model', 'description')
