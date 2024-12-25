import matplotlib.pyplot as plt
import numpy as np

# Parameters
levels = 15  # Adjusted levels for visualization instead of 7 billion points
radius = 1

# Generate Pascal's Triangle
triangle = [[1]]
for i in range(1, levels):
    row = [1]
    for j in range(1, i):
        row.append(triangle[i-1][j-1] + triangle[i-1][j])
    row.append(1)
    triangle.append(row)

# Calculate positions
positions = []
for i, row in enumerate(triangle):
    for j, value in enumerate(row):
        x = j - i / 2  # Horizontal positioning
        y = -i * radius
        positions.append((x, y))

# Plot points
plt.figure(figsize=(10, 10))
plt.axis('equal')
for (x, y) in positions:
    plt.plot(x, y, 'o')

# Draw ellipses between every second point
for i in range(0, len(positions) - 2, 2):
    x1, y1 = positions[i]
    x2, y2 = positions[i+2]
    width = np.sqrt((x2 - x1)**2 + (y2 - y1)**2)
    height = radius * 1.5
    ellipse = plt.matplotlib.patches.Ellipse(
        ((x1 + x2) / 2, (y1 + y2) / 2),
        width, height, angle=0, fill=False, color='blue'
    )
    plt.gca().add_patch(ellipse)

# Create one big ellipse from first to last point
x1, y1 = positions[0]
x2, y2 = positions[-1]
width = np.sqrt((x2 - x1)**2 + (y2 - y1)**2)
height = abs(y2 - y1) * 1.5
big_ellipse = plt.matplotlib.patches.Ellipse(
    ((x1 + x2) / 2, (y1 + y2) / 2),
    width, height, angle=0, fill=False, color='red'
)
plt.gca().add_patch(big_ellipse)

plt.show()
