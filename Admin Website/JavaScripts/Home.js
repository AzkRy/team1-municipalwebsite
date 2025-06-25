document.addEventListener('DOMContentLoaded', function() {
    const data = [
        { category: 'Building Permit', approved: 15, rejected: 8, pending: 12 },
        { category: 'Event Permit', approved: 18, rejected: 7, pending: 10 },
        { category: 'Parking Permit', approved: 25, rejected: 3, pending: 8 },
        { category: 'Rental', approved: 20, rejected: 5, pending: 3 },
        { category: 'Food & Beverages', approved: 22, rejected: 4, pending: 2 },
        { category: 'Manufacturing', approved: 15, rejected: 10, pending: 7 },
        { category: 'Vaccination', approved: 12, rejected: 5, pending: 2 },
        { category: 'Medical Check-Up', approved: 20, rejected: 8, pending: 10 },
        { category: 'Consultation', approved: 25, rejected: 5, pending: 6 },
        { category: 'Medical Health Support', approved: 28, rejected: 10, pending: 5 },
        { category: 'Household Waste', approved: 35, rejected: 2, pending: 2 },
        { category: 'Bulk Waste', approved: 38, rejected: 3, pending: 0 },
        { category: 'Recyclables', approved: 18, rejected: 5, pending: 8 },
        { category: 'Hazardous Waste', approved: 30, rejected: 12, pending: 0 }
    ];

    const allKeys = ['approved', 'rejected', 'pending'];
    let activeKeys = [...allKeys]; 
    const colors = {
        approved: '#44D62C', 
        rejected: '#FF073A', 
        pending: '#FFFF33'   
    };

    const tooltip = d3.select("body").append("div")
        .attr("class", "tooltip")
        .style("opacity", 0)
        .style("position", "absolute")
        .style("background-color", "rgba(0, 0, 0, 0.7)")
        .style("color", "white")
        .style("padding", "8px")
        .style("border-radius", "4px")
        .style("pointer-events", "none"); 

    const drawChart = () => {
        const chartArea = document.getElementById('chart-area');
        if (!chartArea) return;

        d3.select(chartArea).html(''); 

        const containerWidth = chartArea.clientWidth;
        const containerHeight = chartArea.clientHeight;

        const margin = { top: 40, right: 30, bottom: 80, left: 50 };
        const width = containerWidth - margin.left - margin.right;
        const height = containerHeight - margin.top - margin.bottom;

        const svg = d3.select(chartArea)
            .append('svg')
            .attr('width', containerWidth)
            .attr('height', containerHeight)
            .append('g')
            .attr('transform', `translate(${margin.left},${margin.top})`);

        const stack = d3.stack().keys(activeKeys);
        const stackedData = stack(data);

        const xScale = d3.scaleBand()
            .domain(data.map(d => d.category))
            .range([0, width])
            .padding(0.3);

        const maxY = d3.max(stackedData, d => d3.max(d, d => d[1]));
        const yScale = d3.scaleLinear()
            .domain([0, maxY || 1]) 
            .nice()
            .range([height, 0]);

        const colorScale = d3.scaleOrdinal()
            .domain(allKeys) 
            .range(Object.values(colors));

        const bars = svg.append('g')
            .selectAll('g')
            .data(stackedData)
            .join('g')
                .attr('fill', d => colorScale(d.key));

        bars.selectAll('rect')
            .data(d => d)
            .join('rect')
                .attr('x', d => xScale(d.data.category))
                .attr('y', d => yScale(d[1]))
                .attr('height', d => yScale(d[0]) - yScale(d[1]))
                .attr('width', xScale.bandwidth())

                .on("mouseover", function(event, d) {
                    tooltip.transition()
                        .duration(200)
                        .style("opacity", .9);

                    let tooltipContent = `<strong>${d.data.category}</strong><br/>`;
                    allKeys.forEach(key => {

                        if (d.data[key] !== undefined) {
                            tooltipContent += `${key.charAt(0).toUpperCase() + key.slice(1)}: ${d.data[key]}<br/>`;
                        }
                    });

                    tooltip.html(tooltipContent)
                        .style("left", (event.pageX + 10) + "px")
                        .style("top", (event.pageY - 28) + "px");

                    d3.select(this)
                        .attr("stroke", "white")
                        .attr("stroke-width", 2);
                })
                .on("mouseout", function(event, d) {
                    tooltip.transition()
                        .duration(500)
                        .style("opacity", 0);

                    d3.select(this)
                        .attr("stroke", "none");
                });

        // Add X axis
        svg.append('g')
            .attr('class', 'x-axis axis')
            .attr('transform', `translate(0,${height})`)
            .call(d3.axisBottom(xScale))
            .selectAll('text')
                .attr('transform', 'rotate(-45)')
                .style('text-anchor', 'end')
                .attr('dx', '-.8em')
                .attr('dy', '.15em');

        svg.append('g')
            .attr('class', 'y-axis axis')
            .call(d3.axisLeft(yScale));

        const legendContainer = d3.select(chartArea)
            .append('div')
            .attr('class', 'legend');

        allKeys.forEach(key => {
            const legendItem = legendContainer.append('div')
                .attr('class', 'legend-item')
                .classed('inactive', !activeKeys.includes(key)) 
                .on('click', function() {
                    const index = activeKeys.indexOf(key);
                    if (index === -1) {
                        activeKeys.push(key);
                    } else {
                        activeKeys.splice(index, 1);
                    }
                    drawChart(); 
                });

            legendItem.append('div')
                .attr('class', 'legend-color-box')
                .style('background-color', colors[key]);

            legendItem.append('span')
                .text(key.charAt(0).toUpperCase() + key.slice(1).replace(/([A-Z])/g, ' $1'));
        });
    };

    drawChart();

    window.addEventListener('resize', drawChart);
});
