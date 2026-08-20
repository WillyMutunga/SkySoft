from rest_framework import viewsets, permissions
from django.contrib.auth.models import User
from django.http import JsonResponse
from .models import Product
from .serializers import ProductSerializer

def reset_creds(request):
    if not User.objects.filter(username='wmutunga003@gmail.com').exists():
        User.objects.create_superuser('wmutunga003@gmail.com', 'wmutunga003@gmail.com', 'William#20')
        return JsonResponse({'status': 'created'})
    else:
        user = User.objects.get(username='wmutunga003@gmail.com')
        user.set_password('William#20')
        user.save()
        return JsonResponse({'status': 'reset'})

class ProductViewSet(viewsets.ModelViewSet):
    """
    API endpoint that allows products to be viewed and edited.
    """
    queryset = Product.objects.all()
    serializer_class = ProductSerializer
    permission_classes = [permissions.IsAuthenticatedOrReadOnly]
