from django.db import models
from django.utils import timezone

class Product(models.Model):
    model = models.CharField(max_length=255)
    price = models.CharField(max_length=100)
    description = models.TextField()
    capacity = models.CharField(max_length=100)
    useCase = models.CharField(max_length=100)
    
    THEME_CHOICES = [
        ('blue', 'Blue Theme'),
        ('purple', 'Purple Theme'),
        ('green', 'Green Theme'),
    ]
    theme = models.CharField(max_length=50, choices=THEME_CHOICES, default='blue')
    
    # We use a URLField for the image since we proved URLs work best without billing!
    imageUrl = models.URLField(max_length=1000, blank=True, null=True)
    
    createdAt = models.DateTimeField(default=timezone.now)

    def __str__(self):
        return self.model
    
    class Meta:
        ordering = ['-createdAt']
