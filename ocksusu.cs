using System;
using System.Drawing;
using System.Windows.Forms;

public class PaintForm : Form
{
    private Point lastPoint;
    private bool isMouseDown = false;
    private Pen pen = new Pen(Color.Black, 5);
    private Bitmap bitmap;

    public PaintForm()
    {
        this.bitmap = new Bitmap(this.ClientSize.Width, this.ClientSize.Height);
        this.DoubleBuffered = true;
        this.Paint += PaintForm_Paint;
        this.MouseDown += PaintForm_MouseDown;
        this.MouseMove += PaintForm_MouseMove;
        this.MouseUp += PaintForm_MouseUp;
    }

    private void PaintForm_Paint(object sender, PaintEventArgs e)
    {
        e.Graphics.DrawImage(bitmap, 0, 0);
    }

    private void PaintForm_MouseDown(object sender, MouseEventArgs e)
    {
        if (e.Button == MouseButtons.Left)
        {
            this.lastPoint = e.Location;
            this.isMouseDown = true;
        }
    }

    private void PaintForm_MouseMove(object sender, MouseEventArgs e)
    {
        if (this.isMouseDown)
        {
            using (Graphics g = Graphics.FromImage(this.bitmap))
            {
                g.DrawLine(this.pen, this.lastPoint, e.Location);
                this.lastPoint = e.Location;
            }

            this.Invalidate();
        }
    }

    private void PaintForm_MouseUp(object sender, MouseEventArgs e)
    {
        if (e.Button == MouseButtons.Left)
        {
            this.isMouseDown = false;
        }
    }
}
